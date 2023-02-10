@php
    $footerPages = App\Models\Admincp\Sections\Sections::where('lang', app()->getLocale())
        ->where('active', true)
        ->where('parent_section_id', null)
        ->where('type', '!=', 'home')
        ->where('display_in_the_header', true)
        ->orderBy('order')
        ->get();
    
    $languages = App\Models\Admincp\Settings::where('name', 'lang')->get();
    $connectedUrl = App\Models\Admincp\ConnectedRoutes::where('url_from', URL::full())->first();
    
@endphp
{{-- @dd($connectedUrl) --}}
<header class="fixed top-0 z-10 w-full bg-transperent bg-black/60">
    <div class="relative">
        <div class="flex items-center justify-between h-16 max-w-screen-xl px-4 py-2 mx-auto">
            <div
                class="flex items-center justify-between w-auto py-2 font-[1000] text-xl text-white text-gray-300 transition-all duration-200 rounded-lg cursor-pointer lg:justify-start hover:text-gray-300 hover:bg-gray-300 hover:bg-opacity-10">
                <a href="{{ route('homepage') }}" title="{{ env('APP_NAME') }}">
                    {{ env('APP_NAME') }}
                </a>
            </div>
            <div class="flex items-stretch">
                {{-- Menu button --}}
                <button class="self-center block py-4 rounded md:hidden" id="header_menu_button" title="Menu"
                    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-300 w-7 h-7" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <ul class="absolute inset-x-0 bottom-0 items-stretch justify-end hidden w-full text-gray-300 translate-y-full text-md md:border-0 md:flex md:w-auto md:translate-y-0 md:bg-none md:relative"
                    id="header_menu">
                    @if (count($footerPages) > 0)
                        @foreach ($footerPages as $footerPage)
                            <li class="flex flex-row items-center w-auto gap-4 py-0 text-sm">
                                <a class="flex items-center justify-start w-auto w-full px-3 py-2 font-medium text-gray-300 transition-all duration-200 rounded-lg cursor-pointer hover:text-gray-300 hover:bg-gray-300 hover:bg-opacity-10"
                                    href="{{ route('section', ['name' => $footerPage->route_name]) }}"
                                    title="{{ $footerPage->anchor_element_title }}">
                                    {{ $footerPage->name }}
                                </a>
                            </li>
                        @endforeach
                        <li>
                    @endif
                    {{-- Language dropdown --}}
                    @if ($languages->count() > 1)
                        <ul
                            class="flex flex-col items-center w-full gap-4 py-8 text-2xl lg:py-0 lg:flex-row lg:text-sm lg:w-auto">
                            <li class="relative w-auto text-sm" id="navbar_dropdown_button_language"
                                onMouseEnter="toggleDropdownContainer('language')"
                                onMouseLeave="toggleDropdownContainer('language')">
                                <button
                                    class="flex items-center justify-start w-auto w-full px-3 py-2 font-medium text-gray-300 transition-all duration-200 rounded-lg cursor-pointer hover:text-gray-300 hover:bg-gray-300 hover:bg-opacity-10"
                                    type="button">
                                    <a href="#">
                                        {{ strtoupper(explode('-', app()->getLocale())[0]) }}
                                    </a>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="absolute left-0 hidden pt-6" id="navbar_dropdown_container_language">
                                    <ul class="grid w-full px-5 py-4 bg-white rounded-lg shadow-md gap-y-3">
                                        @foreach ($languages as $language)
                                            <li
                                                class="text-sm transition-all duration-200 text-primary-normal hover:text-gray-300 whitespace-nowrap">
                                                @if (explode('-', app()->getLocale())[0] == $language->value)
                                                    <a
                                                        href="@if (isset($connectedUrl)) {{ url($connectedUrl->url_from) }} @else {{ url('/' . $language->value) }} @endif ">
                                                        {{ strtoupper($language->value) }}
                                                    </a>
                                                @else
                                                    <a
                                                        href="@if (isset($connectedUrl)) {{ url($connectedUrl->url_to) }} @else {{ url('/' . $language->value) }} @endif ">
                                                        {{ strtoupper($language->value) }}
                                                    </a>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="absolute z-10 hidden w-full transition ease-in-out bg-primary-normal" id="header_menu_button_items">
    @if (count($footerPages) > 0)
        @foreach ($footerPages as $footerPage)
            <li class="flex items-center ease-in-out">
                <a class="flex items-center w-full h-full p-4 text-gray-300 transition-all ease-in-out md:w-auto hover:text-white"
                    href="{{ route('section', ['name' => $footerPage->route_name]) }}"
                    title="{{ $footerPage->anchor_element_title }}">
                    {{ $footerPage->name }}
                </a>
            </li>
        @endforeach
    @endif
    @foreach ($languages as $language)
        @if ($language->value != app()->getLocale())
            <li
                class="flex items-center w-full p-4 text-gray-300 transition-all ease-in-out md:w-auto hover:text-white">
                @if (explode('-', app()->getLocale())[0] == $language->value)
                    <a
                        href="@if (isset($connectedUrl)) {{ url($connectedUrl->url_from) }} @else {{ url('/' . $language->value) }} @endif ">
                        {{ strtoupper($language->value) }}
                    </a>
                @else
                    <a
                        href="@if (isset($connectedUrl)) {{ url($connectedUrl->url_to) }} @else {{ url('/' . $language->value) }} @endif ">
                        {{ strtoupper($language->value) }}
                    </a>
                @endif
            </li>
        @endif
    @endforeach
</div>
<script>
    document.querySelector("#header_menu_button").addEventListener("click", () => {
        document.querySelector("#header_menu_button_items").classList.toggle("hidden");
    });

    // Toggle the sidebar
    const toggleSidebar = () => {
        const sidebar = document.querySelector("#sidebar");
        sidebar.classList.toggle("hidden");
    };
    // Dropdowns
    function toggleDropdownContainer(dropdownId) {
        const container = document.querySelector(`#navbar_dropdown_container_${dropdownId}`);
        const button = document.querySelector(`#navbar_dropdown_button_${dropdownId} button`);
        container.classList.toggle("hidden");
    }
</script>
