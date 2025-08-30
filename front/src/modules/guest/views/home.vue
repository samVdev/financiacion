<script lang="ts" setup>
import CardDash from '@/modules/Auth/components/CardDash.vue';
import { onMounted } from 'vue';
import useFacturesUser from '@/modules/guest/composable/useFacturesUser';
import NoInfo from '@/components/noInfo.vue';

const {
    counted,
    getCounted
} = useFacturesUser()

onMounted(() => {
    //getFacturesPending()
    //getFacturesCompleted()
    //getCounted()
})

</script>


<template>
    <main>
        <div class="grid grid-cols-1 px-2 gap-5 mx-auto md:px-10 md:grid-cols-3 md:w-[90%] 2xl:w-[80%]">
            <CardDash icon="fa-solid fa-dollar-sign" color="bg-orange-100 text-orange-600" :value="20"
                label="Pagos realizados" />
            <CardDash icon="fa-regular fa-map" color="bg-blue-100 text-blue-600" :value="10"
                label="Cuotas restantes" />
            <CardDash icon="fa-solid fa-triangle-exclamation" color="bg-red-100 text-red-600" :value="2"
                label="Mantenimientos pendientes" />
        </div>


    </main>
</template>