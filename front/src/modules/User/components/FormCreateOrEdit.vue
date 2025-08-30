<script setup lang="ts">
import { onMounted, reactive, ref } from "vue"
import type User from "../types/User"
import type Role from "../types/Role"
import Loader from "@/components/Loader.vue";
import InputPassword from "@/components/inputPassword.vue";
import MiniTitle from "@/components/miniTitle.vue";

const props = defineProps<{
  uuid?: string
  user: User
  sending: boolean
  errors: any
  roles: Role[]
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
    password: form.password,
    role_id: form.role_id,
    cedula: form.cedula,
    dateN: form.dateN,
    dir: form.dir
  }, props.uuid)
}


onMounted(() => {
  if (props.uuid) activeInputPassword.value = false
})

</script>

<template>
  <form @submit.prevent="submit" class="p-6 space-y-6 h-full">

    <MiniTitle class="lg:col-span-2" text="Datos personales" />

    <div class="grid lg:grid-cols-2 gap-6">
      <div>
        <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">Nombre Completo</label>
        <input type="text" id="nombre" required v-model="form.name" placeholder="Nombre Completo"
          class="p-3 w-full border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition-all" />
      </div>

      <div>
        <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">Cédula</label>
        <input type="text" id="cedula" required v-model="form.cedula" placeholder="Cédula"
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

      <MiniTitle class="mt-5 lg:col-span-2" text="Datos del Usuario" />

      <div>
        <label for="rol" class="block text-sm font-semibold text-gray-700 mb-2">Rol</label>
        <select id="rol" required v-model="form.role_id"
          class="p-3 w-full border border-gray-200 rounded-xl shadow-sm capitalize focus:ring-2 focus:ring-[#FF7539] focus:border-[#FF7539] transition">
          <option value="" disabled>Selecciona un Rol</option>
          <option v-for="rol in roles" :key="rol.id" :value="rol.id">{{ rol.name }}</option>
        </select>
      </div>

      <div>
        <label for="contraseña" class="block text-sm font-semibold text-gray-700 mb-2">Contraseña</label>
        <div v-if="activeInputPassword">
          <InputPassword v-model="form.password" name="password" placeholder="Ingresa la contraseña" class="mb-3" />

          <button v-if="uuid" type="button" @click="activeInputPassword = false"
            class="w-full md:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-xl font-medium transition">
            Quitar contraseña
          </button>
        </div>

        <div v-else>
          <button type="button" @click="activeInputPassword = true"
            class="w-full md:w-auto bg-[#FF7539] hover:bg-[#D54A5C] text-white px-4 py-2 rounded-xl font-semibold transition">
            Cambiar contraseña
          </button>
        </div>
      </div>
    </div>

    <div>
      <label for="correo" class="block text-sm font-semibold text-gray-700 mb-2">Dirección (opcional)</label>
      <textarea type="date" id="dir" placeholder="Dirección (opcional)" v-model="form.dir"
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