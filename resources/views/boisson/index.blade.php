@extends('layouts.app')


@section('content')
    <div class="tw-container-fluid tw-mx-auto tw-bg-orange-200 tw-py-10 tw-shadow-md">
        <div class="tw-flex tw-justify-center tw-flex-col tw-items-center">

            <img src="/img/drink.svg" class="tw-w-1/6">
            <h1 class="tw-text-center tw-mt-5 tw-pb-10 tw-text-4xl">Mes Boissons</h1>
            
        </div>
    </div>
    <div class="tw-container tw-mx-auto">

        <div class="tw-flex tw-justify-center">
            
        </div>


        <table class="table tw-mt-10">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Prix Achat</th>
                    <th>Prix Vente</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boissons as $boisson)
                    <tr>
                        <td scope="row">{{ $boisson->nom }}</td>
                        <td>{{ $boisson->prix_achat }}</td>
                        <td>{{ $boisson->prix_vente }}</td>
                        <td>{{ $boisson->stock }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection