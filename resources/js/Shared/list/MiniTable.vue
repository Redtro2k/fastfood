<template>
    <section class="text-gray-600 body-font">
     <div class="container px-5 py-24 mx-auto">

    <slot name="header"></slot>
        <div class="flex flex-wrap -m-4">
            <div v-for="list in lists" :key="list" class="xl:w-1/3 md:w-1/2 p-4">
                <div class="border border-gray-200 p-6 rounded-lg">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                    <CollectionIcon />
                </div>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{list.name}}</h2>
                <p class="leading-relaxed text-base">{{list.description}}</p>
                </div>
            </div>
        </div>
        <Link href="category/new" class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Create</Link>
  </div>

</section>
</template>
<script setup>
import { CollectionIcon } from '@heroicons/vue/outline'
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
    lists: Object
})

</script>
