<script lang="ts" setup>


const props = defineProps<{
    pago: any
}>()
</script>


<template>
    <div class="mt-4 space-y-4">
        <div class="bg-gray-50 rounded-lg p-4 flex flex-col gap-2">
            <div class="flex justify-between items-center">
                <span class="text-lg font-bold">{{ pago.monto }}</span>
                <span :class="['px-2 py-1 rounded-full text-xs font-semibold', pago.color]">
                    {{ pago.metodo }}
                </span>
            </div>
            <div class="text-sm text-gray-500 flex items-center gap-2">
                <font-awesome-icon icon="fa-regular fa-calendar" /> {{ pago.fecha }}
            </div>
            <p class="text-xs text-gray-400">{{ pago.cuota }}</p>
        </div>
    </div>
</template>