<script>
import axios from "axios";
import FilterComponent from "@/components/product/allProductComponent/FilterComponent.vue";
import PaginationComponent from "@/components/product/allProductComponent/PaginationComponent.vue";
import ProductCardComponent from "@/components/product/allProductComponent/ProductCardComponent.vue";

export default {
    name: "AllProductsComponent",
    components: {
        'filter-component': FilterComponent,
        'pagination-component': PaginationComponent,
        'product-card-component': ProductCardComponent
    },
    data() {
        return {
            products: [],
            prevPage: 1,
            nextPage: 1,
            lastPage: 1,
            total: 0,
            priceFilter: null,
            nextPageQuery: {},
            prevPageQuery: {},
        }
    },
    methods: {
        fetch(page, priceFilter) {
            axios.get('/api/v1/products', {
                params: {
                    page: page,
                    price: priceFilter
                }
            })
                .then(response => {
                    if(response.status === 200) {
                        this.products = response.data.data;
                        if(this.products) {
                            let currentPage = response.data.meta.current_page;
                            this.lastPage = response.data.meta.last_page;
                            this.total = response.data.meta.total;

                            this.prevPage = currentPage - 1 <= 0 ? 1 : currentPage - 1;
                            this.nextPage = currentPage + 1 >= this.lastPage ? this.lastPage : currentPage + 1;

                            this.updatePrevPageQuery('page', this.prevPage);
                            this.updatePrevPageQuery('price', priceFilter);

                            this.updateNextPageQuery('page', this.nextPage);
                            this.updateNextPageQuery('price', priceFilter);

                            this.priceFilter = priceFilter;
                        }
                    }
                });
        },

        updatePrevPageQuery(key, value) {
            if (value !== null) this.prevPageQuery[key] = value
        },

        updateNextPageQuery(key, value) {
            if (value !== null) this.nextPageQuery[key] = value
        },
    },

    mounted() {
        let params = new URLSearchParams(document.location.search);
        let page = params.get("page");
        this.fetch(page, this.priceFilter);
    },
}

</script>

<template>
    <filter-component v-if="total > 1" @fetch="fetch" />
    <div v-if="products" class="p-1 flex flex-wrap items-center justify-around max-w-screen-xl mx-auto">
        <div class="my-3" v-for="item in products">
            <product-card-component
                :item='item'
            />
        </div>
    </div>
    <div v-else class="p-1 flex flex-wrap items-center justify-around max-w-screen-xl mx-auto">
        <h3 class="my-6 text-red-700 text-2xl">Товари відсутні</h3>
    </div>
    <pagination-component v-if="lastPage > 1"
        @fetch="fetch"
        :lastPage='this.lastPage'
        :prevPage='this.prevPage'
        :nextPage='this.nextPage'
        :priceFilter='this.priceFilter'
        :prevPageQuery='this.prevPageQuery'
        :nextPageQuery='this.nextPageQuery'
    />
</template>
