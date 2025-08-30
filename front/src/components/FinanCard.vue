<script lang="ts" setup>


const props = defineProps<{
    fin: any
}>()
</script>

<template>
       <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex justify-between items-center">
              <span class="text-lg font-bold">{{ fin.monto }}</span>
              <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-600">
                activa
              </span>
            </div>
            <p class="text-sm text-gray-500">Cuota mensual: {{ fin.cuota }}</p>

            <div class="mt-3">
              <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-black h-2 rounded-full" :style="{ width: fin.progreso + '%' }"></div>
              </div>
              <div class="flex justify-between text-xs text-gray-500 mt-1">
                <span>{{ fin.progreso }}% completado</span>
                <span>{{ fin.actual }}/{{ fin.total }}</span>
              </div>
            </div>
          </div>
</template>