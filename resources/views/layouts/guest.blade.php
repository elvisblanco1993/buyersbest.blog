<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Blog Meta Tags --}}
        @if (request()->routeIs('article.show'))
            <meta name='keywords' content='{{ $meta_tags }}'>
            <meta name='description' content='{{ $meta_description }}'>
            <meta name='subject' content='The best 10 of everything!'>
            <meta name='copyright' content='Buyers Best Blog'>
            <meta name='language' content='EN'>
            <meta name='robots' content='index,follow'>
            <meta name='medium' content='blog'>
            <meta name="author" content="Buyers' Best">

            {{-- OpenGraph --}}
            <meta name="description" content="{{ $meta_description }}">
            <link rel="canonical" href="{{ url()->current() }}">
            <meta property="og:locale" content="es_US">
            <meta property="og:type" content="article">
            <meta property="og:title" content="{{ $title }}">
            <meta property="og:description" content="{{ $meta_description }}">
            <meta property="og:url" content="{{ url()->current() }}">
            <meta property="og:site_name" content="{{ config('app.name') }}">
            <meta property="article:published_time" content="{{ $published_at }}">
            <meta property="og:image" content="{{ asset($artwork) }}">
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:title" content="{{ $title }}">
        @endif

        @if (request()->routeIs('article.show') || request()->routeIs('home'))
            <meta name="google-adsense-account" content="ca-pub-6691661138979501">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6691661138979501"
                crossorigin="anonymous"
            ></script>

            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-QGXW91GD8M"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-QGXW91GD8M');
            </script>
        @endif




        <title>{{ ($title ?? '') . ' ' . config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900|noto-serif-georgian:700,800,900" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans dark:bg-slate-900 text-gray-900 dark:text-gray-100 antialiased">

        @auth
            <div class="w-full bg-amber-300 text-black py-2">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 hover:text-amber-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z" clip-rule="evenodd" />
                        </svg>
                        <span>Back to dashboard</span>
                    </a>
                </div>
            </div>
        @endauth

        <div class="w-full bg-white/90 dark:bg-slate-900/90 backdrop-blur h-16 lg:h-20 sticky top-0">
            <div class="h-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="h-full flex items-center justify-between">
                    <a href="/">
                        <div class="font-black text-xl tracking-wider">BUYERS <span class="text-rose-500">BEST</span></div>
                    </a>

                    @livewire('website.search')
                </nav>
            </div>
        </div>

        <div>
            {{ $slot }}
        </div>

        <footer class="py-2 text-center text-slate-600 dark:text-slate-500 font-light">
            <small>Crafted with ❤️ and croquetas in Miami, Fl.</small>
        </footer>

        @livewireScripts
    </body>
</html>
