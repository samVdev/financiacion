<script setup lang="ts">
import { onMounted, reactive, ref } from "vue"
import type User from "../types/User"
import Loader from "@/components/Loader.vue";
import MiniTitle from "@/components/miniTitle.vue";

const props = defineProps<{
  uuid?: string
  user: User
  sending: boolean
  errors: any
}>()

const emit = defineEmits<{
  (e: 'submit', user: User, userId?: string): void
}>()


const form: User = reactive(props.user)

const activeInputPassword = ref(true)

const submit = async () => {
  emit('submit', {
    name: form.name,
    email: form.email,
    phone: form.phone,
    cedula: form.cedula,
    dateN: form.dateN,
    dir: form.dir,
    earnings: form.earnings
  }, props.uuid)
}


onMounted(() => {
  if (props.uuid) activeInputPassword.value = false
})

</script>

<template>
  <form @submit.prevent="submit" class="space-y-6 ">

    <MiniTitle class="lg:col-span-2" text="Datos personales" />

    <div class="grid lg:grid-cols-2 gap-6">
      <div>
        <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">Nombre Completo</label>
        <input type="text" id="nombre" required v-model="form.name" placeholder="Nombre Completo"
          class="p-3 w-full border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition-all" />
      </div>

      <div>
        <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">Cédula</label>
        <input type="text" id="cedula" required v-model="form.cedula" placeholder="Cédula" maxlength="15"
          class="p-3 w-full border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition-all" />
      </div>

      <div>
        <label for="celular" class="block text-sm font-semibold text-gray-700 mb-2">Celular</label>
        <input type="tel" id="celular" required v-model="form.phone" maxlength="15" placeholder="Ej: 0412000000"
          class="p-3 w-full border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition-all" />
      </div>

      <div>
        <label for="correo" class="block text-sm font-semibold text-gray-700 mb-2">Correo Electrónico</label>
        <input type="email" id="correo" required v-model="form.email" placeholder="Correo Electrónico"
          class="p-3 w-full border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition-all" />
      </div>


      <div>
        <label for="correo" class="block text-sm font-semibold text-gray-700 mb-2">Fecha de Nacimiento</label>
        <input type="date" id="dateN" required v-model="form.dateN"
          class="p-3 w-full border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition-all" />
      </div>

      <div>
        <label for="correo" class="block text-sm font-semibold text-gray-700 mb-2">Ingresos Mensuales</label>
        <input type="text" id="earnings" required v-model="form.earnings" placeholder="Ingresos Mensuales"
          class="p-3 w-full border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition-all" />
      </div>
    </div>

    <div>
      <label for="correo" class="block text-sm font-semibold text-gray-700 mb-2">Dirección (opcional)</label>
      <textarea type="date" id="dir" placeholder="Dirección (opcional)" v-model="form.dir" maxlength="500"
        class="p-3 w-full border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition-all resize-none" />
    </div>

    <div class="flex justify-end space-x-3">
      <button v-if="!sending" type="submit"
        class="w-full md:w-auto bg-[#FF7539] hover:bg-[#D54A5C] text-white px-6 py-3 rounded-2xl font-bold shadow-md transition transform hover:scale-[1.02]">
        Guardar
      </button>

      <Loader v-else class="mx-auto" />
    </div>
  </form>
</template>

<style>
#password {
  @apply p-3 w-full border border-gray-200 shadow-sm focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition-all
}
</style>