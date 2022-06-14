<template>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <form @submit.prevent="submit">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- product name -->
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                                <div class="mt-1">
                                    <input type="text" v-model="form.name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Product Name" />
                                        <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
                                </div>
                            </div>
                        </div>
                        <!-- about -->
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">Category About </label>
                            <div class="mt-1">
                                <textarea v-model="form.description" id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="you@example.com" />
                                <div v-if="form.errors.name" v-text="form.errors.description" class="text-red-500 text-xs mt-1"></div>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Brief description of this category.</p>
                        </div>
                        </div>
                    </div>
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                    </progress>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </BreezeAuthenticatedLayout>
</template>
<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
const props = defineProps({
    selected_id: String,
    category: Object
})


const form = useForm({
    name: props.category[0].name,
    description: props.category[0].description
})

let submit = () => {
    form.post(`/category/update/${props.selected_id}`, {
        preserveScroll: true
    });
}

</script>
