<script setup lang="ts">
import Welcome from '@/components/welcome.vue';
import HeaderLanding from '@/layouts/HeaderLanding.vue';
import CardItem from '../components/CardItem.vue';
import Requeriments from '../components/Requeriments.vue';
import Benefits from '@/layouts/landing/benefits.vue';
import CarrouselInicial from '../components/CarrouselInicial.vue';
import BikesCarrousel from '../components/BikesCarrousel.vue';
import CarsCarrousel from '../components/CarsCarrousel.vue';

</script>

<template>
    <main class="w-full bg-white">
        <HeaderLanding />
        <!--Welcome>
            <div class="w-[40%] mx-auto grid grid-cols-1 place-content-center gap-5 z-[1000] pb-[10vh] md:grid-cols-2">
                <router-link to="/login" data-aos="fade-right"
                    class="relative bg-[#FF7539] hover:text-[#FF7539] hover:bg-white transition-all text-white font-bold w-full text-center mt-4 h-[60px] grid place-items-center rounded-3xl">
                    <p>Iniciar Sesión</p>
                </router-link>
                <router-link to="/login" data-aos="fade-left"
                    class="relative text-[#FF7539] bg-white hover:text-white hover:bg-[#FF7539] transition-all font-bold w-full text-center mt-4 h-[60px] grid place-items-center rounded-3xl">
                    <p>Ver requisitos</p>
                </router-link>
            </div>
        </Welcome-->


        <section class="relative">
            <article class="absolute inset-0 z-10 px-4 sm:px-8 flex flex-col justify-end text-center">
                <div class="absolute inset-0 bg-black/60"></div>

                <a to="/requisitos" data-aos="fade-left" href="#requeriments"
                    class="px-10 md:w-[20%] mx-auto mb-[10vh] bg-[#FF7539] hover:bg-white hover:text-[#FF7539] transition-all text-white font-bold py-3 sm:py-4 rounded-3xl text-lg sm:text-xl flex items-center justify-center">
                    Ver requisitos
                    <font-awesome-icon icon="fa-solid fa-arrow-down-long" class="ml-2"/>
            </a>

                <!--div class="relative z-20 mt-10 md:mt-0 space-y-6">
                    <h1 class="font-regular text-2xl sm:text-3xl md:text-4xl xl:text-[6vh] font-extrabold text-[#FF7539] drop-shadow-lg"
                        data-aos="fade-down">
                        CUMPLE TU SUEÑO DE TENER TU
                    </h1>

                    <h2 class="font-regular text-[10vw] sm:text-[8vw] md:text-[6vw] xl:text-[10vh] font-extrabold text-white drop-shadow-lg"
                        data-aos="fade-up">
                        PROPIO VEHÍCULO
                    </h2>

                    <router-link to="/requisitos" data-aos="fade-left"
                        class="md:w-[30%] mx-auto bg-[#FF7539] hover:bg-white hover:text-[#FF7539] transition-all text-white font-bold py-3 sm:py-4 rounded-3xl text-lg sm:text-xl flex items-center justify-center">
                        Ver requisitos
                    </router-link>
                </div-->
            </article>

            <CarrouselInicial />
        </section>



        <div class="bg-gray-100">

            <div id="benefits" class="bg-[#ff7539] px-0 pt-20 pb-40 mt-10 md:pt-20 text-center text-white">
                <h2 class="text-3xl md:text-5xl font-extrabold text-center ">
                    ¿Por qué financiar con <span class="text-[#000000]">Nuestra Empresa</span>?
                </h2>
                <p class="font-semibold mt-4 text-xl md:text-3xl">Algunos de nuestros beneficios</p>
            </div>

            <Benefits />

            <router-link to="/login" data-aos="fade-up"
                class="my-16 mx-auto md:w-[30%] bg-[#160e0a] hover:text-[#FF7539] hover:bg-white transition-all text-white font-bold w-full text-center h-[60px] grid place-items-center rounded-3xl">
                <p>Iniciar Sesión</p>
            </router-link>

            <section id="Motos" class="py-32 bg-white">
                <div class="max-w-6xl mx-auto px-6 text-center">

                    <h2 class="text-3xl md:text-5xl font-extrabold text-center mb-16">
                        Motos <span class="text-[#FF7539]">Disponibles</span>
                    </h2>

                    <BikesCarrousel />
                </div>
            </section>

            <section id="Carros" class="py-20 bg-gray-100">
                <div class="max-w-6xl mx-auto px-6 text-center">

                    <h2 class="text-3xl md:text-5xl font-extrabold text-center mb-16">
                        Carros <span class="text-[#FF7539]">Disponibles</span>
                    </h2>
                    <CarsCarrousel/>
                </div>
            </section>


            <Requeriments />

        </div>
        <footer class="bg-gray-900 text-gray-400 text-center py-6">
            <p>© 2025 RentaMotors. Todos los derechos reservados.</p>
        </footer>
    </main>
</template>


<style>
@font-face {
    font-family: "Boldonse";
    src: url("/fonts/ArchivoBlack-Regular.ttf");
}

.font-regular {
    font-family: "Boldonse", system-ui, sans-serif;
    font-weight: 400;
    font-style: normal;
}
</style>