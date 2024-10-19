<script>
export default {
    name: "FilterComponent",
    methods:{
        fetch(page, price){
            this.$emit('fetch', page, price);
        }
    }
}
</script>

<template>
    <div class="p-1 flex flex-wrap justify-end max-w-screen-xl mx-auto">
        <ul class="flex flex-wrap items-center justify-around text-sm text-gray-700 dark:text-gray-200">
            <li>
                <router-link
                    @click.prevent="fetch(1, 'asc')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    :to="{ name: 'all-products', query: { page: 1, price: 'asc' }}">
                    Низька ціна
                </router-link>
            </li>
            <li>
                <router-link
                    @click.prevent="fetch(1, 'desc')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    :to="{ name: 'all-products', query: { page: 1, price: 'desc' }}">
                    Висока ціна
                </router-link>
            </li>
        </ul>
    </div>
</template>
