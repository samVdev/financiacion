<script lang="ts" setup>
import CardDash from '@/modules/Auth/components/CardDash.vue';
import { onMounted, ref } from 'vue';
import useFacturesUser from '@/modules/guest/composable/useFacturesUser';
import NoInfo from '@/components/noInfo.vue';
import MiniTitle from '@/components/miniTitle.vue';

const {
    counted,
    getCounted
} = useFacturesUser()

onMounted(() => {
    //getFacturesPending()
    //getFacturesCompleted()
    //getCounted()
})


// Ejemplo - conecta luego con tu API/composable
const pagos = ref([
    { id: 1, fecha: '01/08/2025', monto: '$100', estado: 'Pagado' },
    { id: 2, fecha: '01/09/2025', monto: '$120', estado: 'Pendiente' }
])

const mantenimientos = ref([
    { id: 1, fecha: '10/07/2025', descripcion: 'Cambio de filtro', estado: 'Realizado' },
    { id: 2, fecha: '20/09/2025', descripcion: 'Revisión general', estado: 'Pendiente' }
])

</script>


<template>
    <main class="mx-auto md:w-[90%] 2xl:w-[80%]">

        <div class="grid grid-cols-1 gap-5 mt-10 md:grid-cols-2">
            <section>
                <MiniTitle text="Pagos:" class="!text-2xl mb-6" />

                <div v-if="pagos.find(p => p.estado === 'Pendiente')"
                    class="bg-gradient-to-r from-orange-50 to-orange-100 border-l-4 border-orange-500 rounded-xl p-6 mb-6 shadow">
                    <h3 class="text-lg font-semibold text-orange-700 mb-2">Próximo pago</h3>
                    <p class="text-gray-700">
                        Fecha: <span class="font-bold">{{pagos.find(p => p.estado === 'Pendiente')?.fecha}}</span>
                    </p>
                    <p class="text-gray-700">
                        Monto: <span class="font-bold text-orange-600">{{pagos.find(p => p.estado ===
                            'Pendiente')?.monto }}</span>
                    </p>
                </div>

            </section>

            <section>
                <MiniTitle text="Mantenimientos:" class="!text-2xl mb-6" />

                <div v-if="mantenimientos.find(m => m.estado === 'Pendiente')"
                    class="bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 rounded-xl p-6 mb-6 shadow">
                    <h3 class="text-lg font-semibold text-red-700 mb-2">Mantenimiento pendiente</h3>
                    <p class="text-gray-700">
                        Fecha: <span class="font-bold">{{mantenimientos.find(m => m.estado === 'Pendiente')?.fecha
                            }}</span>
                    </p>
                    <p class="text-gray-700">
                        Descripción: <span class="font-bold">{{mantenimientos.find(m => m.estado ===
                            'Pendiente')?.descripcion }}</span>
                    </p>
                </div>
            </section>
        </div>


        <MiniTitle text="Accesos rápidos" class="mb-10" />

        <div class="grid grid-cols-1 px-2 gap-5 md:px-10 md:grid-cols-3">
            <CardDash icon="fa-solid fa-dollar-sign" color="bg-orange-100 text-orange-600" :value="20"
                label="Pagos realizados" />
            <CardDash icon="fa-regular fa-map" color="bg-blue-100 text-blue-600" :value="10" label="Cuotas restantes" />
            <CardDash icon="fa-solid fa-triangle-exclamation" color="bg-red-100 text-red-600" :value="2"
                label="Mantenimientos pendientes" />
        </div>

    </main>
</template>