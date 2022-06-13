<template>
    <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <div class="flex flex-wrap -m-4">
            <div class="p-4 lg:w-1/2 md:w-full" v-for="list in lists" :key="list">
                <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                    <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                        <DatabaseIcon/>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{list.name}}</h2>
                        <p class="leading-relaxed text-base">{{list.description}}</p>
                        <Link class="mt-3 text-indigo-500 inline-flex items-center" :href="`${url}/${list.id}`">View Orders<Link/>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</template>
<script setup>
import { DatabaseIcon } from '@heroicons/vue/outline'
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
    lists: Object,
    url: String
})
</script>
