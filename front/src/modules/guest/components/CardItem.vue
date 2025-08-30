<script lang="ts" setup>
const props = defineProps<{
    image: string,
    title: string,
    description: string,
}>()
</script>

<template>
    <div
        class="group relative bg-white rounded-2xl shadow-md hover:shadow-2xl transition transform hover:-translate-y-2 overflow-hidden" data-aos="fade-up">
        <div class="h-48 w-full overflow-hidden">
            <img :src="image" :alt="title"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
        </div>

        <div class="p-6 text-center">
            <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-orange-500 transition">
                {{ title }}
            </h3>
            <p class="text-gray-600 text-sm mb-4">
                {{ description }}
            </p>

            <button
                class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold py-2 px-6 rounded-full shadow-md transition">
                Ver más
            </button>
        </div>

        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-orange-500 to-red-500"></div>
    </div>
</template>