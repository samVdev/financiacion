<template>
  <section id="requeriments" class="relative w-[90%] mx-auto my-16 rounded-3xl py-20 bg-[#ff7539] text-white">
    <img src="/bg.svg" class="absolute inset-0 w-full h-full"/>

    <div class="relative max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-4xl md:text-5xl font-extrabold mb-12">
        Requisitos para Aplicar
      </h2>

      <div class="grid md:grid-cols-2 gap-8 text-left">
        <div
          class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg flex items-start gap-4 hover:bg-white/20 transition">
          <span
            class="flex h-12 w-12 items-center justify-center rounded-full bg-white text-orange-500 text-2xl font-bold">1</span>
          <div>
            <h3 class="text-lg font-semibold">Cédula de identidad vigente</h3>
            <p class="text-sm text-orange-100">Documento oficial para validar tu identidad.</p>
          </div>
        </div>

        <div
          class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg flex items-start gap-4 hover:bg-white/20 transition">
          <span
            class="flex h-12 w-12 items-center justify-center rounded-full bg-white text-orange-500 text-2xl font-bold">2</span>
          <div>
            <h3 class="text-lg font-semibold">Licencia de conducir</h3>
            <p class="text-sm text-orange-100">Debe estar vigente según el tipo de vehículo.</p>
          </div>
        </div>

        <div
          class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg flex items-start gap-4 hover:bg-white/20 transition">
          <span
            class="flex h-12 w-12 items-center justify-center rounded-full bg-white text-orange-500 text-2xl font-bold">3</span>
          <div>
            <h3 class="text-lg font-semibold">Referencias personales y bancarias</h3>
            <p class="text-sm text-orange-100">Necesarias para validar tu perfil financiero.</p>
          </div>
        </div>

        <div
          class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg flex items-start gap-4 hover:bg-white/20 transition">
          <span
            class="flex h-12 w-12 items-center justify-center rounded-full bg-white text-orange-500 text-2xl font-bold">4</span>
          <div>
            <h3 class="text-lg font-semibold">Comprobante de ingresos</h3>
            <p class="text-sm text-orange-100">Puede ser carta de trabajo o constancia bancaria.</p>
          </div>
        </div>

        <div
          class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg flex items-start gap-4 hover:bg-white/20 transition md:col-span-2">
          <span
            class="flex h-12 w-12 items-center justify-center rounded-full bg-white text-orange-500 text-2xl font-bold">5</span>
          <div>
            <h3 class="text-lg font-semibold">Depósito de garantía</h3>
            <p class="text-sm text-orange-100">Varía según el vehículo elegido.</p>
          </div>
        </div>
      </div>


      <router-link to="/login" data-aos="fade-right"
        class="block bg-white text-orange-600 font-semibold py-3 px-10 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition transform mt-12 w-[50%] mx-auto">
        <p>Iniciar Sesión</p>
      </router-link>
    </div>
  </section>
</template>

<script setup>
</script>