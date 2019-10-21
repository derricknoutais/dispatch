

<script>
export default {
    props: ['commande_prop'],
    data(){
        
        return {
            commande: {
                boissons: []
            },
            selected : {
                boisson: 'Selectionner Boisson',
                quantité : 0
            },
            état_enregistrement : '',
            editing: false,
            reception : false,
            ajoutBoisson: false
        }
    },
    methods:{
        
        toggleEdit(){
            this.editing = ! this.editing;
        },
        toggleReception(){
            this.reception = ! this.reception
        },
        toggleAjouterBoissons(){
            this.ajoutBoisson = ! this.ajoutBoisson
        },
        ajouterBoisson(){
            // Ajoute la quantité à la boisson
            this.état_enregistrement = 'Enregistrement en cours ...'

            var boisson = this.commande.boissons.find( boisson => boisson.id == this.selected.boisson.id)
            console.log(boisson);

            if(boisson){
                boisson.pivot.quantité += this.selected.quantité
                boisson.commande_id = this.commande.id
                boisson.found = true
            } else {
                
                this.selected.boisson.pivot = {}
                this.selected.boisson.pivot.quantité = this.selected.quantité
                this.selected.boisson.commande_id = this.commande.id

                boisson = this.selected.boisson
                boisson.found = false
            }
            

            axios.post('/commande-produit', boisson).then( response => {
                boisson.pivot.id = response.data

                if(! boisson.found){
                    this.commande.boissons.push(boisson)
                    this.$forceUpdate()
                } else {
                    this.$forceUpdate()
                }

                setTimeout(() => {
                    this.état_enregistrement = 'Livraison Enregistrée'
                }, 4000);
                
                setTimeout(() => {
                    this.état_enregistrement = ''
                }, 4000);
                    
                
            }).catch(error => {

            });
            
        },

        enregistrer(){
            axios.post('/enregistrer-commande/' + this.commande.id, this.commande ).then(response => {
                this.commande.état = 'validé'
                this.$forceUpdate()
            }).catch(error => {
                console.log(error);
            });
        },
        enregistrerModifications(){
            axios.post('/enregistrer-modifications/' + this.commande.id, this.commande).then(response => {
                this.editing = false;
                this.$forceUpdate();
                
            }).catch(error => {
                console.log(error);
            });
        },
        toutMarquerCommeRecu(){
            this.commande.boissons.forEach( boisson => {
                boisson.pivot.quantité_reçue = boisson.pivot.quantité
            })
            this.$forceUpdate()
        },
        receptionnerBoissons(){
            axios.post('/receptionner-boissons/' + this.commande.id, this.commande ).then(response => {
                this.commande.état = 'réceptionné'
                this.toggleReception();
                this.$forceUpdate()
                console.log(response.data);
                
            }).catch(error => {
                console.log(error);
            });
        }
    },
    computed: {
        total(){
            var total = 0;
            if(this.commande.boissons){
                this.commande.boissons.forEach( boisson =>{
                    total += boisson.prix_achat * boisson.pivot.quantité
                })
            }
            
            return total;
        }
        
    },
    created(){
        this.commande = this.commande_prop

        this.commande.boissons.forEach( boisson => {
            boisson.quantité_reçue = null
        })
    }
}
</script>