@extends('layouts.app')


@section('content')
    <div class="tw-container tw-mx-auto">
        <h1 class="tw-text-4xl tw-text-center">Flotte</h1>

        {{-- Liste des véhicules --}}

        <table class="table tw-mt-10">
            <thead>
                <tr>
                    <th>Immatriculation</th>
                    <th>Stock Actuel</th>
                    <th>Valeur Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flotte as $véhicule)
                    <tr>
                        <td scope="row">
                            <a href="/flotte/{{ $véhicule->id }}">
                                {{ $véhicule->immatriculation }}
                            </a>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection