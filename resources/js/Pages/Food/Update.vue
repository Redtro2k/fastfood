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
                                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <div class="mt-1">
                                    <input type="text" v-model="form.name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Product Name" />
                                        <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
                                </div>
                            </div>
                        </div>
                        <!-- price -->
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
                                <div class="mt-1">
                                    <input type="number" v-model="form.price" name="price" id="price" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Product Price" />
                                          <div v-if="form.errors.price" v-text="form.errors.price" class="text-red-500 text-xs mt-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-white border-b border-gray-200">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category type</label>

                            <v-select  v-model="form.category" :options="props.categories" label="name" :reduce="name => name.category"/>
                            <div v-if="form.errors.category" v-text="form.errors.category" class="text-red-500 text-xs mt-1"></div>

                        </div>

                        <div class="p-6 bg-white border-b border-gray-200">
                            <label class="block text-sm font-medium text-gray-700">Images</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex-inline text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <input type="file" @input="form.image = $event.target.files[0]"/>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>

                                </div>
                            </div>
                        <div v-if="form.errors.image" v-text="form.errors.image" class="text-red-500 text-xs mt-1"></div>

                        </div>

                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                        </progress>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button :disabled="form.processing" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    </div>
                </div>
            </div>
        </form>

    </BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head,useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'

let props = defineProps({
    categories: Object,
    foods: Object,
    selected_id: String
})



let initializeId = () => {
    return props.foods[props.selected_id.slice(1)];
}


let form = useForm({
    name: initializeId().name,
    price: initializeId().price,
    category: initializeId().cid,
    image: null
});

let submit = () => {
    form.post(`/food/update/${props.selected_id}`, {
        preserveScroll: true
    });
}

</script>
