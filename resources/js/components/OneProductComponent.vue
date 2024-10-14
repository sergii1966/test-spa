<script>
export default {
    name: "OneProductComponent",
    props: ['id'],

    mounted() {
        //alert(this.id);
    }
}
</script>

<template>
    OneProductComponent
    {{ $route.params.id }}
</template>

<style scoped>

</style>
