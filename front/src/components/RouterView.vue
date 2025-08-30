<script lang="ts" setup>

const props = defineProps<{
    conditionForView?: boolean
}>()
</script>

<template>
    <router-view v-slot="{ Component }">
        <Transition name="expandModal">
            <div v-if="conditionForView"
                class="overlay bg-[#05050563] md:grid md:place-items-center">

                <div class="w-full h-full relative mx-auto py-24 px-16 pt-28 bg-white md:rounded-3xl md:w-[80%] md:min-h-[80%]">
                    <button @click="$router.back()" class="absolute left-8 top-10 text-xl text-[#FF7539] font-bold">
                        <font-awesome-icon icon="fa-solid fa-angle-left" />
                        volver
                    </button>
                    <component :is="Component" :key="$route.path" />
                </div>
            </div>
        </Transition>
    </router-view>
</template>