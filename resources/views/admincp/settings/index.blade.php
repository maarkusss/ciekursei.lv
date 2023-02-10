@extends('layouts.app')

@section('title', 'Settings - ' . env('APP_NAME'))

@section('content')
    <div class="grid w-full grid-cols-3 p-4 mb-4 bg-white rounded-lg">
        <h1 class="text-xl font-medium text-gray-700">Settings</h1>
    </div>
    <div class="w-full p-4 bg-white rounded">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="p-4 text-lg font-bold text-gray-700">Main information</h2>
            <div class="grid gap-4 mt-2 mb-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @if ($logo = \App\Models\Admincp\Settings::where('name', 'logo')->first())
                    <label class="flex flex-col w-full p-4">
                        <span class="mb-2 text-sm font-medium text-gray-600">Logo</span>
                        <div class="flex items-center justify-center h-12" id="website-image-container">
                            <img class="object-contain max-w-full max-h-full" id="website-image" src="{{ $logo->value }}"
                                alt="Website logo">
                        </div>
                    </label>
                @endif
                <label class="flex flex-col w-full p-4">
                    <span class="mb-2 text-sm font-medium text-gray-600">Name *</span>
                    <input class="px-3 py-2 border-gray-300 rounded-lg focus:border-primary-dark focus:ring-primary-dark"
                        name="name" type="text" placeholder="Website's name"
                        @auth
value="{{ $name->value }}" @endauth required>
                </label>
                <label class="flex flex-col w-full p-4">
                    <span class="mb-2 text-sm font-medium text-gray-600">Logo</span>
                    <input
                        class="px-3 py-2 text-xs text-gray-700 border border-gray-300 rounded focus:ring-primary-dark focus:border-primary-dark"
                        name="logo" type="file" accept="image/*" onchange="displayImage(this);" id="fileInput">
                </label>
                <label class="flex flex-col w-full p-4">
                    <span class="mb-2 text-sm font-medium text-gray-600">Sitemap Crawler link *</span>
                    <input class="px-3 py-2 border-gray-300 rounded-lg focus:border-primary-dark focus:ring-primary-dark"
                        name="sitemap" type="url" placeholder="Sitemap crawler link"
                        @auth
value="{{ $sitemap->value }}" @endauth required>
                </label>
                <label class="flex flex-col w-full p-4">
                    <span class="mb-2 text-sm font-medium text-gray-600">Country code *</span>
                    <input class="px-3 py-2 border-gray-300 rounded-lg focus:border-primary-dark focus:ring-primary-dark"
                        name="country_code" type="text" placeholder="Country code"
                        @auth
value="{{ $country_code->value }}" @endauth required>
                </label>
            </div>
            <label class="flex flex-col flex-auto w-full m-4">
                <span class="mb-2 text-sm font-medium text-gray-600">Head code (appears in &lt;head&gt; on
                    public-layout pages)</span>
                <textarea class="px-3 py-2 border-gray-300 rounded-lg resize-y focus:border-primary-dark focus:ring-primary-dark"
                    name="head_code" cols="30" rows="10">@auth @if ($head_code)
{{ $head_code->value }}
@endif @endauth
</textarea>
            </label>
            <div class="grid gap-4 mb-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col w-full p-4 m-4 border rounded-xl">
                    <h2 class="mb-2 text-lg font-medium text-gray-700">Language selection</h2>
                    <label class="flex items-center my-1 text-gray-700 text-normal">
                        <input name="lang['lv']" value="lv" type="checkbox"
                            class="mr-2 border-gray-300 rounded form-checkbox text-primary-normal focus:ring-primary-dark"
                            @auth @if ($lang->where('value', 'lv')->first()) checked @endif @endauth>
                        Latvian
                    </label>
                </div>
            </div>
            <div class="flex flex-row justify-end">
                <button
                    class="flex flex-row items-center px-3 py-2 text-sm font-medium text-white rounded bg-primary-normal hover:bg-primary-dark"
                    type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script>
        const activeSection = document.getElementById("sidebar-settings");

        activeSection.classList.add("text-stone-900", "bg-primary-normal/40", "font-semibold");

        function displayImage(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let lenderImage = document.getElementById("website-image");
                    let lenderImageContainer = document.getElementById("website-image-container");
                    lenderImage.src = e.target.result;
                    lenderImage.alt = "Logo";
                    lenderImageContainer.classList.add("h-48");
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
<script>
    // Select inputs
    const toggleSelect = (e) => {
        const selectButton = e;
        const selectButtonInput = e.querySelector("input");
        const selectDropdown = e.parentNode.querySelector("#select_dropdown");
        const selectDropdownItems = e.parentNode.querySelectorAll("#select_dropdown_item");
        selectDropdown.classList.toggle("hidden");
        var buttonColor = selectButton.querySelector("#select_button_color")
        selectDropdownItems.forEach(item => {
            item.addEventListener("click", () => {
                var startsWith = "bg";
                var classes = buttonColor.className.split(
                    " ").filter(function(v) {
                    return v.lastIndexOf(startsWith, 0) !== 0;
                });
                buttonColor.className = classes.join(" ")
                    .trim();

                selectButtonInput.value = item.value;
                buttonColor.classList.add("bg-" +
                    item
                    .value);
                selectButton.querySelector("#select_button_text").innerHTML = item
                    .value;
                selectDropdown.classList.add("hidden");
            });
        });
    }
    // Toggle switches
    const toggleSwitches = document.querySelectorAll("#toggle_switch");
    toggleSwitches.forEach(toggleSwitch => {
        const toggleSwitchValue = toggleSwitch.querySelector("#toggle_switch_value");
        // Toggle the classes on load
        if (toggleSwitchValue.value == 1) {
            toggleSwitch.querySelector("div").classList.toggle("translate-x-4");
            toggleSwitch.classList.toggle("bg-primary-normal");
            toggleSwitch.classList.toggle("border-primary-normal");
        }
        toggleSwitch.addEventListener("click", () => {
            toggleSwitchValue.value == 0 ? toggleSwitchValue.value = 1 : toggleSwitchValue
                .value = 0;
            toggleSwitch.querySelector("div").classList.toggle("translate-x-4");
            toggleSwitch.classList.toggle("bg-primary-normal");
            toggleSwitch.classList.toggle("border-primary-normal");
        });
    });
</script>
