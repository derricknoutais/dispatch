<template>

    <button class="tw-btn tw-btn-teal" @click="emitToggleLivraison">
        <slot name="button"></slot>
    </button>
</template>

<script>
export default {
    data(){
        return {
            livraison: false
        }
    },
    methods:{
        emitToggleLivraison(){
            this.livraison = ! this.livraison
            this.$emit('toggle_livraison', this.livraison)
        }
    },
    mounted(){

    }
}
</script>