<template>
    <Head title="Welcome" />
    <Navigation titleCompany="Redtro Food Menu" />
    <BoxSpan :lists="categories" url="foods"/>
</template>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navigation from '@/Shared/Navigation.vue'
import BoxSpan from '@/Shared/BoxSpan.vue'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    categories: Object
})
</script>

