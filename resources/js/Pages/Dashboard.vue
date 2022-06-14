<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import GridList from '@/Shared/list/GridList.vue';

const props = defineProps({
    foods: Number,
    categories: Number,
})

const projects = [
  { name: 'Foods', initials: 'F', href: '/food', members: props.foods, bgColor: 'bg-pink-600' },
  { name: 'Categories', initials: 'C', href: '/category', members: props.categories, bgColor: 'bg-purple-600' },
]

</script>

<template>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="py-12 px-6">
            <GridList :projects="projects"/>

        </div>

    </BreezeAuthenticatedLayout>
</template>
