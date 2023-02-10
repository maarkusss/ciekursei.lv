@php
    $sections = App\Models\Admincp\Sections\Sections::where('lang', app()->getLocale())
        ->where('active', true)
        ->where('parent_section_id', null)
        ->where('type', '!=', 'home')
        ->where('display_in_the_header', false)
        ->orderBy('order')
        ->get();
@endphp

<footer class="bg-primary-normal">
    <section class="max-w-screen-xl py-2 mx-auto">
        <div class="px-4">
            @if (count($sections) > 0)
                <div class="flex items-center justify-center my-4">
                    @foreach ($sections as $section)
                        <a class="px-2 text-sm text-left text-white hover:underline"
                            href="{{ route('section', ['name' => $section->route_name]) }}">
                            {{ $section->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        {{-- <p class="p-4 text-sm text-white">@lang('footerText')</p> --}}
        <div class="flex items-center justify-between px-4 py-3 text-sm">
            <div class="flex flex-col items-start justify-start text-sm text-white">
                <p> © {{ env('APP_NAME') }} - {{ date('Y') }}
                <p class="flex">@lang('Developed by')
                    <a class="px-1 hover:underline" href="https://goodday.group/" target="_blank" title="Goodday Group">
                        goodday.group
                    </a>
                </p>
                </p>
            </div>
            {{-- <ul class="flex flex-row items-start justify-end">
                <li class="px-2"><a href="https://www.facebook.com/kredituapvienosana" target="_blank"
                        title="ciekursei.lv"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="#fff"
                            viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none"></rect>
                            <circle cx="128" cy="128" r="96" fill="none" stroke="#fff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></circle>
                            <path d="M168,88H152a23.9,23.9,0,0,0-24,24V224" fill="none" stroke="#fff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                            <line x1="96" y1="144" x2="160" y2="144" fill="none"
                                stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                            </line>
                        </svg></a></li>
                <li class="px-2"><a href="https://instagram.com/apvienosana" target="_blank" title="ciekursei.lv"><svg
                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="#fff" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none"></rect>
                            <circle cx="128" cy="128" r="34" fill="none" stroke="#fff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></circle>
                            <rect x="32" y="32" width="192" height="192" rx="48"
                                fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="24"></rect>
                            <circle cx="180" cy="76" r="16"></circle>
                        </svg></a></li>
            </ul> --}}
        </div>
    </section>
</footer>
