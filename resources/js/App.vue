<script>

</script>

<template>
    <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
        <div :key="route.name">

        </div>
    </router-view>
</template>
