<script>
export default {
    name: "AllProductsComponent"
}
let params = new URLSearchParams(document.location.search);
let sss = params.get("sss");
alert(sss);
</script>

<template>
    AllProductsComponent
</template>

<style scoped>

</style>
