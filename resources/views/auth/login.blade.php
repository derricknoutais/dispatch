@extends('layouts.app')

@section('content')
    <div class="tw-container tw-mx-auto">
        <div class="tw-flex ftw-lex-wrap tw-justify-center">
            <div class="tw-w-full tw-max-w-sm">
                <div class="tw-flex tw-flex-col tw-break-words tw-bg-white tw-border tw-border-2 tw-rounded tw-shadow-md">

                    <div class="tw-font-semibold tw-bg-orange-200 tw-text-gray-700 tw-py-3 tw-px-6 tw-mb-0">
                        Se Connecter
                    </div>

                    <form class="tw-w-full tw-p-6" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="tw-flex tw-flex-wrap tw-mb-6">
                            <label for="téléphone" class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2">
                                Adresse Mail:
                            </label>

                            <input id="téléphone" type="text" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight tw-focus:outline-none tw-focus:shadow-outline{{ $errors->has('téléphone') ? ' tw-border-red-500' : '' }}" name="téléphone" value="{{ old('téléphone') }}" required autofocus>

                            @if ($errors->has('téléphone'))
                                <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-4">
                                    {{ $errors->first('téléphone') }}
                                </p>
                            @endif
                        </div>

                        <div class="tw-flex tw-flex-wrap tw-mb-6">
                            <label for="password" class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold mb-2">
                                Mot de Passe:
                            </label>

                            <input id="password" type="password" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight tw-focus:outline-none tw-focus:shadow-outline{{ $errors->has('password') ? ' tw-border-red-500' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-4">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="tw-flex tw-mb-6">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="tw-text-sm tw-text-gray-700 tw-ml-3" for="remember">
                                Se Rappeler de Moi
                            </label>
                        </div>

                        <div class="tw-flex tw-flex-wrap tw-items-center">
                            <button type="submit" class="tw-bg-orange-500 tw-hover:bg-blue-700 tw-text-gray-100 tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-focus:outline-none tw-focus:shadow-outline">
                                Se Connecter
                            </button>

                            @if (Route::has('password.request'))
                                <a class="tw-text-sm tw-text-orange-500 tw-hover:text-blue-700 tw-whitespace-no-wrap tw-no-underline tw-ml-auto" href="{{ route('password.request') }}">
                                    Mot de Passe Oublié?
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <p class="tw-w-full tw-text-xs tw-text-center tw-text-gray-700 tw-mt-8 tw--mb-4">
                                    Pas de Compte? 
                                    <a class="tw-text-orange-500 tw-hover:text-blue-700 tw-no-underline" href="{{ route('register') }}">
                                        S'enregistrer
                                    </a>
                                </p>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
