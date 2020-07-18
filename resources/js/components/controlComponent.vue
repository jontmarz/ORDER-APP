<template>
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <product-component></product-component>
            <order-component></order-component>
        </div>
        <div class="row justify-content-center">
            <list-component></list-component>
            <listprod-component></listprod-component>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
