<template>
    <Head title="Welcome" />
    <Navigation titleCompany="Redtro Food Menu" />
    <Box :lists="categories"/>
</template>
<script setup>
import {Head} from '@inertiajs/inertia-vue3'
import Box from '@/Shared/Box.vue'
import Navigation from '@/Shared/Navigation.vue'
defineProps({
    categories: Object,
})
</script>
