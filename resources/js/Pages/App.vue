<script setup>
import OpacityTransition from "./transitions/OpacityTransition.vue";
</script>

<template>
    <div id="org-checker-app">
        <RouterView v-slot="{ Component }">
            <OpacityTransition>
                <Component :is="Component"/>
            </OpacityTransition>
        </RouterView>
    </div>
</template>

<style scoped>
#org-checker-app {
    width: 100%;
    height: 100%;
}
</style>
