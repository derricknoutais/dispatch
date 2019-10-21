<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="tw-bg-gray-100 tw-h-screen antialiased tw-leading-none">
    <div id="app" class="tw-h-full">
        <nav class="tw-bg-orange-600 tw-shadow tw-py-6">
            <div class="tw-container tw-mx-auto tw-px-6 tw-md:px-0">
                <div class="tw-flex tw-items-center tw-justify-center">
                    <div class="tw-mr-6">
                        <a href="{{ url('/') }}" class="tw-text-lg tw-font-semibold tw-text-gray-100 tw-no-underline">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <a href="/boisson" class="tw-text-lg tw-font-semibold tw-text-gray-100 tw-no-underline tw-ml-5">
                            Boissons
                        </a>
                        <a href="/commande" class="tw-text-lg tw-font-semibold tw-text-gray-100 tw-no-underline tw-ml-5">
                            Commandes
                        </a>
                        {{-- <a href="/flotte" class="tw-text-lg tw-font-semibold tw-text-gray-100 tw-no-underline tw-ml-5">
                            Flotte
                        </a> --}}
                        <a href="/livraison" class="tw-text-lg tw-font-semibold tw-text-gray-100 tw-no-underline tw-ml-5">
                            Livraisons
                        </a>
                    </div>
                    <div class="tw-flex-1 tw-text-right">
                        @guest
                            <a class="tw-no-underline tw-hover:underline tw-text-gray-300 tw-text-sm tw-p-3" href="{{ route('login') }}">Se Connecter</a>
                            @if (Route::has('register'))
                                <a class="tw-no-underline tw-hover:underline tw-text-gray-300 tw-text-sm tw-p-3" href="{{ route('register') }}">S'enregistrer</a>
                            @endif
                        @else
                            <span class="tw-text-gray-300 tw-text-sm tw-pr-4">{{ Auth::user()->name }}</span>

                            <a href="{{ route('logout') }}"
                               class="tw-no-underline tw-hover:underline tw-text-gray-300 tw-text-sm tw-p-3"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Se Déconnecter</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="tw-hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
