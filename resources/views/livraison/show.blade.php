@extends('layouts.app')


@section('content')
 
    <show-livraison :livraison_prop="{{ $livraison }}" inline-template >
        <div class="tw-container tw-mx-auto">
            <h1 class="tw-text-center tw-text-2xl">Livraison {{ $livraison->nom }}</h1>

            <div class="tw-flex">
                <ajouter-boisson :boisson_ajoutée_prop="baas" :model="{{ $livraison }}" :boissons="{{ $boissons }}" @boisson_ajoutée="ajouterBoisson">
                </ajouter-boisson>

                

            </div>
            <div class="tw-flex" v-if="livraison.état !== 'livré'">
                <valider-mouvement  class="mt-3" @toggle_livraison="toggleLivraison">
                    <template slot="button">Valider Livraison</template>
                </valider-mouvement>
            </div>

            <table class="table tw-mt-20">
                <thead>
                    <tr>
                        <th>Désignation</th>
                        <th>Quantité à Livrer</th>

                        <th v-if="valider_livraison || livraison.état === 'livré'">Quantité Livrée</th>

                        <th>Prix Vente</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="boisson in livraison.boissons">
                        <td scope="row">@{{ boisson.nom }}</td>

                        <td>@{{ boisson.pivot.quantité }}</td>

                        <td v-if="valider_livraison">
                            <input type="text" class="tw-input" v-model.number="boisson.pivot.quantité_livrée">
                        </td>
                        
                        <td v-if="livraison.état === 'livré'">@{{ boisson.pivot.quantité_livrée }}</td>

                        <td>@{{ boisson.prix_vente }}</td>
                        <td>@{{ boisson.pivot.quantité * boisson.prix_vente }}</td>
                    </tr>
                    <tr v-if="valider_livraison" class="tw-py-10">
                        <td colspan="2"></td>
                        <td>
                            <a href="#" class="tw-btn tw-btn-teal tw-py-1" @click="toutMarquerCommeRecu" >Tout Marqué Comme Reçu</a>
                        </td>
                        <td colspan=2></td>
                    </tr>
                    <tr>
                        <td :colspan=" valider_livraison || livraison.état === 'livré' ? 4:3" class="tw-text-right">Total</td>

                        <td>@{{ total }}</td>
                    </tr>
                </tbody>
            </table>


            <div class="tw-flex tw-justify-center">
                <a href="#" class="tw-btn tw-btn-teal tw-mt-5 " @click="validerLivraison" v-if="valider_livraison">Valider</a>
            </div>




        </div>
    </show-livraison>

@endsection