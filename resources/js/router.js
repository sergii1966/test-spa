import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: 'main',
        component: () => import("./Components/MainComponent.vue"),
    },
    {
        path: "/about",
        name: 'about',
        component: () => import("./Components/AboutComponent.vue"),
    },
    {
        path: "/products",
        name: 'all-products',
        component: () => import("./Components/AllProductsComponent.vue"),
    },
    {
        path: "/products/:id",
        name: 'one-product',
        component: () => import("./Components/OneProductComponent.vue"),
    },
    {
        path: '/:pathMatch(.*)*',
        // name: '404',
        component: () => import("./Components/NotfoundComponent.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
