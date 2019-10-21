<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <style>
        .skew {
            transform: skewY(-10deg) translateY(-220px)
        }
        .container-skew {
            transform: skewY(10deg)
        }
    </style>
</head>
<body class="tw-bg-gray-100 tw-h-screen tw-antialiased tw-leading-none">
    <div class="tw-flex tw-flex-col">
        

        <div class="tw-flex tw-flex-col tw-mt-12">

            <div class="tw-bg-orange-600 tw-py-64 skew tw-shadow-xl">

                <div class="tw-flex tw-flex-col tw-justify-center tw-items-center container-skew">
                    <img src="/img/logistics.svg" class="tw-text-center tw-w-64">
                    <h1 class="tw-text-center tw-text-6xl tw-text-orange-100 tw-mt-5">{{ config('app.name', 'Laravel') }}</h1>
                    <p class="tw-text-center tw-text-2xl tw-text-orange-200 tw-mt-5">Le leader dans la gestion des débits de boissons</p>
                    @guest
                        <a class="tw-btn tw-btn-white tw-mt-5 tw-text-lg" href="/register">Créer un compte</a>
                        <p class="tw-text-lg tw-text-orange-200 tw-mt-3">Déja enregistré? <a href="/login">Connectez-vous</a></p>
                    @else
                        <a class="tw-btn tw-btn-white tw-mt-5 tw-text-lg" href="/home">Voir Dashboard</a>
                    @endguest


                </div>
                
            </div> 

            <div class="tw-container tw-mx-auto tw-flex tw-items-center tw-justify-center tw-py-10">
                <div class="tw-w-1/2 tw-flex tw-justify-center">
                    <img src="/img/analysis.svg" class=" tw-w-1/2">
                </div>
                <div class="tw-w-1/2">
                    <p class="tw-text-3xl">Gérer votre entreprise avec aise</p>
                    <p class="tw-mt-3">Fini les casses-têtes avec une comptabilité douteuse</p>
                </div>
            </div>

            <div class="tw-container tw-mx-auto tw-flex tw-items-center tw-justify-center tw-mt-5 tw-py-20">
                
                <div class="tw-w-1/2 tw-text-right">

                    <p class="tw-text-3xl">Gardez un oeil sur vos affaires!</p>
                    <p class="tw-mt-3">Fini les casses-têtes avec une comptabilité douteuse</p>
                </div>

                <div class="tw-w-1/2 tw-flex tw-justify-center">

                    <img src="/img/analytics.svg" class=" tw-w-1/2">
                </div>
                
                
            </div>
            

            <div class="tw-container-fluid tw-flex tw-flex-col tw-bg-gray-800 tw-text-orange-100 tw-pt-20">
                <h2 class="tw-text-3xl tw-text-center">Notre Équipe</h2>

                <div class="tw-flex tw-w-full tw-justify-center tw-mt-10">
                    <div class="tw-w-1/3 tw-flex tw-flex-col tw-items-center tw-justify-center">
                        <img src="/img/derrick.png" class="tw-rounded-full tw-w-1/3">
                        <h3 class="tw-text-xl">Chef Programmeur</h3>
                    </div>
                    <div class="tw-w-1/3 tw-flex tw-flex-col tw-items-center tw-justify-center">
                        <img src="/img/leonce.png" class="tw-rounded-full tw-w-1/3">
                        <h3 class="tw-text-xl">Chef Logisticien</h3>
                    </div>
                    <div class="tw-w-1/3 tw-flex tw-flex-col tw-items-center tw-justify-center">
                        <img src="/img/khady.jpg" class="tw-rounded-full tw-w-1/3">
                        <h3 class="tw-text-xl">Chef Marketing</h3>
                    </div>
                </div>
                <svg class="tw-shadow-lg" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1447.25 118.58">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #dc6c21;
                                stroke: #000;
                                stroke-miterlimit: 10;
                                stroke-width: 0.25px;
                            }
                        </style>
                    </defs>
                    <title>wave</title>
                    <path class="cls-1" d="M-40,268S235,88,460,172s447,157,947,7V302H-40Z" transform="translate(40.13 -149.54)" />
                </svg>
            </div>

            {{-- Footer --}}

            <div class="tw-container-fluid tw-flex tw-flex-col tw-justify-center tw-items-center tw-py-10 tw-bg-orange-600">
                <h4 class="tw-text-2xl tw-text-center tw-text-orange-100">Ce qu'ils Disent Sur Nous</h4>
            </div>
        </div>
    </div>
</body>
</html>
