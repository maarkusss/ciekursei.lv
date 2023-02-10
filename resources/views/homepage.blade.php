@extends('layouts.homepage')

@section('title', $homepage->title . ' - ' . env('APP_NAME'))
@section('description', $homepage->description)
@section('keywords', $homepage->keywords)
@section('schema')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "@yield('title')",
            "description": "@yield('description')",
            "url": "{{ url()->current() }}",
            "logo": "
            @if ($logo = \App\Models\Admincp\Settings::where('name', 'logo')->first())
                {{ 'https://ciekursei.lv' . $logo->value }}
            @endif
            ",
            "image": "https://ciekursei.lv/images/icon-192x192.png",
            "email": "mailto:info@ciekursei.lv",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Saldus",
                "postalCode": "3801",
                "streetAddress": "Liela iela 9",
                "addressCountry": "LV"
            }
        }
    </script>
@endsection
@section('content')
    <main>
        <section>
            <div class="max-w-full px-4 mx-auto">
                <div class="max-w-full prose text-center">
                    {!! $homepage->source !!}
                </div>
            </div>
            @if ($homepage->text)
                <section class="max-w-6xl px-4 mx-auto">
                    <div class="max-w-full prose">
                        {!! $homepage->text !!}
                    </div>
                </section>
            @endif
        </section>
    </main>
@endsection
