<script>
export default {
    name: "ProductCardComponent",
    props: [
        'item'
    ]
}
</script>

<template>
    <div
        class="flex flex-col justify-between h-[38rem] max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a v-if="item.images.data[0] !== undefined && item.images.data[0].url_sm !== undefined" href="#">
            <img class="rounded-t-lg" :src="item.images.data[0].url_sm" alt=""/>
        </a>
        <h4 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ item.name }}</h4>
        <p class="mb-3 font-bold text-center text-3xl text-gray-700 dark:text-gray-400">
            <span class="mx-2" :class="{'line-through': item.price.price_new}">{{ item.price.price_old }} грн</span>
            <span v-if="item.price.price_new" class="mx-2 text-red-700 text-4xl">{{ item.price.price_new }} грн</span>
        </p>
        <a href="#"
           class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Дізнайся більше</a>
    </div>
</template>
