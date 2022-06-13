<template>
    <Popup :show="openModal" @close-modal="openModal = false"/>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="px-4 pt-5 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Foods</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of the food records including their categories.</p>
                </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <Link href="/food/create" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add Foods</Link>
                <!-- @click="openModal = true" -->
                </div>
            </div>
            <Table :lists="foods"/>
        </div>
  </BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import {ref} from 'vue';
import Table from '@/Shared/list/Table.vue'
import Popup from '@/Shared/Modals/Popup.vue'
defineProps({
    foods: Object
})
const openModal = ref(false);

</script>
