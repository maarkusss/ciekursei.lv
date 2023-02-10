@if (!request()->cookie('cookies_accepted'))
    <div class="fixed inset-x-0 bottom-0 hidden bg-black/50" id="cookies_notification">
        <div class="flex flex-col items-center justify-start max-w-screen-xl px-4 py-4 mx-auto md:flex-row">
            <p class="text-xs text-white">
                @lang('By using this website, in accordance with the rules, you agree to the placement of cookies on your device. Cookies collect data about visiting the website, the data is anonymous and helps to offer you suitable content. You can change your consent at any time.')
            </p>
            <button
                class="px-2.5 py-1.5 mt-2 md:mt-0 text-xs font-[1000] transition-all text-white rounded xs:text-sm bg-[#53C54A] hover:bg-[#3EA735] uppercase shrink-0"
                id="cookies_notification_button" type="button" title="@lang('I agree')">
                @lang('I agree')
            </button>
        </div>
    </div>
    <script src="{{ mix('js/cookiesNotification.js') }}"></script>
@endif
