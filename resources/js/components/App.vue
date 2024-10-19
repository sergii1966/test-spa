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
<!--    <router-view v-slot="{ Component, route }">-->
<!--        <div :key="route.name">-->
<!--            <Component :is="Component" />-->
<!--        </div>-->
<!--        <div :key="route.name">-->

<!--        </div>-->
<!--    </router-view>-->
</template>
