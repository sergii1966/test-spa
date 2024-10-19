<script>
import NavbarComponent from "@/components/common/NavbarComponent.vue";
export default {
    name: "App",
    props: [
    ],

    components: {
        'navbar-component': NavbarComponent,
     },
}
</script>

<template>
    <navbar-component></navbar-component>
    <router-view></router-view>
</template>
