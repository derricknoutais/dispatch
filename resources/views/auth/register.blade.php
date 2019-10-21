@extends('layouts.app')

@section('content')
    <div class="tw-container tw-mx-auto tw-h-full">
        <div class="tw-flex tw-flex-wrap tw-h-full tw-justify-center tw-mt-5">
            <div class="tw-w-full tw-max-w-sm">
                <div class="tw-flex tw-flex-col tw-break-words tw-bg-white tw-border tw-border-2 tw-rounded tw-shadow-md">

                    <div class="tw-font-semibold tw-bg-orange-200 tw-text-gray-700 tw-py-3 tw-px-6 tw-mb-0">
                        Créer un Nouveau Compte
                    </div>

                    <form class="tw-w-full tw-p-6" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="tw-flex tw-flex-wrap tw-mb-6">
                            <label for="name" class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2">
                                Nom:
                            </label>
                            <input id="name" type="text" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight tw-focus:outline-none tw-focus:shadow-outline{{ $errors->has('name') ? ' tw-border-red-500' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-4">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                        <div class="tw-flex tw-flex-wrap tw-mb-6">
                            <label for="entreprise" class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2">
                                Entreprise:
                            </label>

                            <input id="entreprise" type="text" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight tw-focus:outline-none tw-focus:shadow-outline{{ $errors->has('entreprise') ? ' tw-border-red-500' : '' }}" name="entreprise" value="{{ old('entreprise') }}" required autofocus>

                            @if ($errors->has('entreprise'))
                                <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-4">
                                    {{ $errors->first('entreprise') }}
                                </p>
                            @endif
                        </div>

                        <div class="tw-flex tw-flex-wrap tw-mb-6">
                            <label for="téléphone" class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2">
                                Nº Téléphone:
                            </label>

                            <input id="téléphone" type="text" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight tw-focus:outline-none tw-focus:shadow-outline{{ $errors->has('téléphone') ? ' tw-border-red-500' : '' }}" name="téléphone" value="{{ old('téléphone') }}" required autofocus>

                            @if ($errors->has('téléphone'))
                                <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-4">
                                    {{ $errors->first('téléphone') }}
                                </p>
                            @endif
                        </div>

                        <div class="tw-flex tw-flex-wrap tw-mb-6">
                            <label for="email" class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2">
                                Adresse Mail:
                            </label>

                            <input id="email" type="email" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight tw-focus:outline-none tw-focus:shadow-outline{{ $errors->has('email') ? ' tw-border-red-500' : '' }}" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-4">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="tw-flex tw-flex-wrap tw-mb-6">
                            <label for="password" class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2">
                                Mot de Passe:
                            </label>

                            <input id="password" type="password" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight tw-focus:outline-none tw-focus:shadow-outline{{ $errors->has('password') ? ' tw-border-red-500' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-4">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="tw-flex tw-flex-wrap tw-mb-6">
                            <label for="password-confirm" class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2">
                                Confirmer Mot de Passe:
                            </label>

                            <input id="password-confirm" type="password" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight tw-focus:outline-none tw-focus:shadow-outline" name="password_confirmation" required>
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="tw-inline-block tw-align-middle tw-text-center tw-select-none tw-border tw-font-bold tw-whitespace-no-wrap tw-py-2 tw-px-4 tw-rounded tw-text-base tw-leading-normal tw-no-underline tw-text-gray-100 tw-bg-orange-500 tw-hover:bg-blue-700">
                                S'enregistrer
                            </button>

                            <p class="tw-w-full tw-text-xs tw-text-center tw-text-gray-700 tw-mt-8 tw--mb-4">
                                Vous avez déjà un compte?
                                <a class="tw-text-orange-500 tw-hover:text-blue-700 tw-no-underline" href="{{ route('login') }}">
                                    Connectz-vous
                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
