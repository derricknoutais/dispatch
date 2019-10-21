<template>
    <div class="tw-flex tw-flex-col">
        <div class="tw-flex tw-items-center">
            <button class="tw-btn tw-btn-teal" v-if="model.état !== 'livré'" @click="toggleAjouterBoissons">Ajouter Boissons</button>

            <p class="ml-5">{{ état_enregistrement }}</p>
        </div>
        

        <div class="tw-flex tw-mt-8" v-if="ajoutBoisson">
            <select v-model="selected.boisson">
                    <option selected>Selectionner Boisson</option>
                    <option :value=" boisson" v-for="boisson in boissons">{{ boisson.nom }}</option>
            </select>

            <input type="number"  v-model.number="selected.quantité" placeholder="Quantité">

            <button class="tw-btn tw-btn-teal" @click="ajouterBoisson">Ajouter Produit</button>
        </div>

    </div>
</template>

<script>
export default {
    props: ['model', 'boissons','boisson_ajoutée_prop'],
    data(){
        return {
            état_enregistrement: '',
            ajoutBoisson: false,
            selected: {
                boisson: 'Selectionner Boisson',
                quantité: null
            }

        }
    },
    methods:{
        toggleAjouterBoissons(){
            this.ajoutBoisson = ! this.ajoutBoisson
        },
        ajouterBoisson(){
            this.état_enregistrement = 'Enregistrement en cours ...'
            this.$emit('boisson_ajoutée', this.selected)
        }
    },
    watch:{
        boisson_ajoutée_prop(){
            console.log('change')
            if(this.boisson_ajoutée_prop){
                this.état_enregistrement = 'Livraison Enregistrée'
            } else {
                this.état_enregistrement = ''
            }

        }
    },
    mounted(){

    }
}
</script>