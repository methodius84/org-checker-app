<script setup lang="ts">

</script>

<template>
    <Transition name="opacity-transition" mode="out-in">
        <slot/>
    </Transition>
</template>

<style>
.opacity-transition-enter-from,
.opacity-transition-leave-to {
    opacity: 0;
}

.opacity-transition-enter-active,
.opacity-transition-leave-active {
    transition: opacity ease-in .2s;
}
.opacity-transition-enter-to,
.opacity-transition-leave-from {
    opacity: 1;
}
</style>
