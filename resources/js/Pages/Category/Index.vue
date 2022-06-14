<template>
<Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="py-12 mx-6">
            <MiniTable :lists="categories">
                <template #header>
                    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">List of Category</h1>
                        <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">add more category...</p>
                    </div>
                </template>
            </MiniTable>
        </div>
      </BreezeAuthenticatedLayout>

</template>
<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import MiniTable from '@/Shared/list/MiniTable.vue'
import { Head } from '@inertiajs/inertia-vue3';


defineProps({
    categories: Object
})
</script>
