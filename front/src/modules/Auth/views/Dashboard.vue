<script setup lang="ts">
import CardDash from '@/modules/Auth/components/CardDash.vue';
import useDashboard from '../composables/useDashboard';
import { onMounted, ref } from 'vue';
import PaymentCard from '../../../components/paymentCard.vue';
import FinanCard from '@/components/FinanCard.vue';

const {
  countedData,
  getCountedData,
} = useDashboard()

onMounted(() => {
  getCountedData()
})

const pagos = [
  { monto: "$365.000", metodo: "efectivo", color: "bg-green-100 text-green-600", fecha: "04 de octubre, 2023", cuota: "Cuota #2" },
  { monto: "$350.000", metodo: "transferencia", color: "bg-blue-100 text-blue-600", fecha: "31 de agosto, 2023", cuota: "Cuota #1" },
]

const financiaciones = [
  { monto: "$8.500.000", cuota: "$350.000", progreso: 21, actual: 5, total: 24 },
  { monto: "$9.200.000", cuota: "$400.000", progreso: 50, actual: 12, total: 24 },
  { monto: "$12.000.000", cuota: "$250.000", progreso: 0, actual: 0, total: 48 },
  { monto: "$10.000.000", cuota: "$190.476,19", progreso: 0, actual: 0, total: 52 },
]
</script>

<template>

  <main id="dashboard" class="mt-[-4vh] pb-10 md:pb-0 relative w-[95%] mx-auto md:w-[90%]">

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
      <CardDash icon="fa-solid fa-users" color="bg-orange-100 text-orange-600" :value="countedData.clients"
        label="Total Cliente" />
      <CardDash icon="fa-solid fa-motorcycle" color="bg-blue-100 text-blue-600" :value="countedData.bikes"
        label="Total Motos" />
      <CardDash icon="fa-solid fa-dollar-sign" color="bg-green-100 text-green-600" :value="countedData.earnigs"
        label="Ingresos del Mes" />
      <CardDash icon="fa-solid fa-wallet" color="bg-purple-100 text-purple-600" :value="countedData.activesPayment"
        label="Financiaciones Activas" />
      <CardDash icon="fa-solid fa-triangle-exclamation" color="bg-pink-100 text-pink-600"
        :value="countedData.manteniment" label="Mantenimientos Pendientes" />
    </div>

    <div class="grid md:grid-cols-2 gap-6 py-6">
      <section class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold flex items-center gap-2 text-gray-700 border-b pb-4">
          <span class="text-green-500">$</span> Pagos Recientes
        </h2>
          <PaymentCard :pago="pago" v-for="pago in pagos"/>
      </section>

      <section class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold flex items-center gap-2 text-gray-700 border-b pb-4">
          <span class="text-purple-500">▢</span> Financiaciones Activas
        </h2>

        <div class="mt-4 space-y-4">
           <FinanCard  v-for="(fin, i) in financiaciones" :key="i" :fin="fin"/>
        </div>
      </section>
    </div>

  </main>

</template>
