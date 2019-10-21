
<script>
export default {
    props: ['livraison_prop'],
    data(){
        return {
            livraison: null,
            editing: false,
            valider_livraison: false,
            baas: false
        }
    },
    computed: {
        total(){
            var total = 0;
            this.livraison.boissons.forEach(boisson => {
                total += boisson.prix_vente * boisson.pivot.quantité
            })
            return total;
        }
    },
    methods:{
        ajouterBoisson(payload){

            var boisson = this.livraison.boissons.find( boisson => boisson.id === payload.boisson.id)

            if(boisson){
                boisson.pivot.quantité += payload.quantité
                boisson.livraison_id = this.livraison.id
                boisson.found = true
            } else {
                payload.boisson.pivot = {}
                payload.boisson.pivot.quantité = payload.quantité
                payload.boisson.livraison_id = this.livraison.id
                boisson = payload.boisson
                boisson.found = false
            }
            axios.post('/livraison-produit', boisson).then(response => {
                boisson.pivot.id = response.data
                
                if(! boisson.found){
                    this.livraison.boissons.push(boisson)
                    this.$forceUpdate()
                } else {
                    this.$forceUpdate()
                }
                setTimeout(() => {
                    this.baas = true;
                }, 1000);

                setTimeout(() => {
                    this.baas = false
                }, 2000);
                
            }).catch(error => {
                console.log(error);
            });
        },
        toggleLivraison(){
            this.valider_livraison = ! this.valider_livraison
        },
        toutMarquerCommeRecu(){
            this.livraison.boissons.forEach( boisson => {
                boisson.pivot.quantité_livrée = boisson.pivot.quantité
            })
            this.$forceUpdate()
        },
        validerLivraison(){
            axios.post('/valider-livraison/' + this.livraison.id, this.livraison).then(response => {
                console.log(response.data);
                this.livraison.état = 'livré'
                this.valider_livraison = false
                this.$forceUpdate()
            }).catch(error => {
                console.log(error);
            });
        }
    },
    created(){
        this.livraison = this.livraison_prop
        if(! this.livraison.boissons){
            this.livraison.boissons = [];
        }
    }
}
</script>