@extends('layouts.app')


@section('content')

    <show-commande :commande_prop="{{ $commande }}" inline-template>
        <div class="tw-container tw-mx-auto">
            <h1 class="tw-text-center tw-mt-5 tw-text-4xl">Commande {{ $commande->nom }}</h1>

            {{-- Boutons Fonctionalité --}}
            <div class="tw-flex tw-flex-col tw-mt-10">
                <div class="tw-flex">
                    <button class="tw-btn tw-btn-teal" v-if="commande.état !== 'réceptionné'" @click="toggleAjouterBoissons">Ajouter Boissons</button>
                </div>
                {{-- Ajouter Produit --}}
                <div class="tw-flex tw-mt-8" v-if="ajoutBoisson">
                    <select v-model="selected.boisson">
                            <option selected>Selectionner Boisson</option>
                        @foreach ($boissons as $boisson)
                            <option :value="{{ $boisson }}">{{ $boisson->nom }}</option>
                        @endforeach
                    </select>

                    <input type="number"  v-model.number="selected.quantité" placeholder="Quantité">

                    <a href="#" class="tw-btn tw-btn-teal" @click="ajouterBoisson">Ajouter Produit</a>
                </div>

                <div class="tw-flex tw-mt-5">
                    <a href="#" class="tw-btn tw-btn-teal" @click="toggleReception">Valider Commande</a>
                </div>
            </div>

            
            
            {{-- Liste Commande --}}
            <table class="table tw-mt-20">
                <thead>
                    <tr>
                        <th>Désignation</th>
                        <th>Quantité</th>

                        {{-- Si état est validé --}}
                        <th v-if="reception || commande.état === 'réceptionné'">Quantité Reçue</th>
                        
                        <th>Prix Achat</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="boisson in commande.boissons">
                        <td scope="row">@{{ boisson.nom }}</td>

                        <td v-if="editing">
                            <input type="text" class="tw-input" v-model="boisson.pivot.quantité">
                        </td>
                        <td v-else>@{{ boisson.pivot.quantité }}</td>

                        <td v-if="reception">
                            <input type="text" class="tw-input" v-model.number="boisson.pivot.quantité_reçue">
                        </td>
                        <td v-if="commande.état === 'réceptionné'">@{{ boisson.pivot.quantité_reçue }}</td>

                        <td>@{{ boisson.prix_achat }}</td>
                        <td>@{{ boisson.pivot.quantité * boisson.prix_achat }}</td>
                    </tr>
                    <tr v-if="reception" class="tw-py-10">
                        <td colspan="2"></td>
                        <td>
                            <a href="#" class="tw-btn tw-btn-teal tw-py-1" @click="toutMarquerCommeRecu" v-if="reception" >Tout Marqué Comme Reçu</a>
                        </td>
                        <td colspan=2></td>
                    </tr>
                    <tr>
                        <td :colspan="reception || commande.état === 'réceptionné' ? 4 : 3" class="tw-text-right">Total</td>
                        
                        <td>@{{ total }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- Si état est validé --}}
            <div class="tw-flex tw-justify-center">
                <a href="#" class="tw-btn tw-btn-teal tw-mt-5 " @click="receptionnerBoissons" v-if="reception">Receptionner</a>
                <a href="#" class="tw-btn tw-btn-teal tw-mt-5 " @click="enregistrerModifications" v-if="editing">Enregistrer Modifications</a>
            </div>
            
            
        </div>
    </show-commande>
       
@endsection