@extends('layouts.app')


@section('content')
    <div class="tw-container-fluid tw-mx-auto tw-bg-orange-200 tw-py-10 tw-shadow-md">
        <div class="tw-flex tw-justify-center tw-flex-col tw-items-center">

            <img src="/img/office.svg" class="tw-w-1/6">
            <h1 class="tw-text-center tw-mt-5 tw-text-4xl">Mes Commandes</h1>
            <button type="button" class="tw-btn tw-btn-teal tw-mt-5" data-toggle="modal" data-target="#modelId">
                Ajouter une Commande
            </button>
        </div>
    </div>
    <div class="tw-container tw-mx-auto">

        
        

        <!-- Button trigger modal -->
        


        <table class="table tw-mt-10">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>État</th>
                    <th>Date de création</th>
                    <th>Date de Modification</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandes as $commande)
                    <tr>
                        <td><a href="/commande/{{ $commande->id }}" >{{ $commande->nom }}</a></td>
                        <td>{{ $commande->état }}</td>
                        <td>{{ $commande->created_at }}</td>
                        <td>{{ $commande->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>







        
        
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nouvelle Commande</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="/commande" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" name="nom" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="tw-btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="tw-btn tw-btn-teal">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection