import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: "/",
        name: 'main',
        component: () => import("../components/main/MainComponent.vue"),
    },
    {
        path: "/about",
        name: 'about',
        component: () => import("../components/about/AboutComponent.vue"),
    },
    {
        path: "/contact",
        name: 'contact',
        component: () => import("../components/contact/ContactComponent.vue"),
    },
    {
        path: "/products",
        name: 'all-products',
        component: () => import("../components/product/AllProductsComponent.vue"),
    },
    {
        path: "/products/:id",
        name: 'one-product',
        component: () => import("../components/product/OneProductComponent.vue"),
    },
    {
        path: "/404.html",
        name: '404',
        component: () => import("../components/common/NotfoundComponent.vue"),
    },
    {
        path: '/:pathMatch(.*)*',
        // name: '404',
        component: () => import("../components/common/NotfoundComponent.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
