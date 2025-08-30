<script setup lang="ts">
import Welcome from '@/components/welcome.vue';
import HeaderLanding from '@/layouts/HeaderLanding.vue';
import CardItem from '../components/CardItem.vue';
import Requeriments from '../components/Requeriments.vue';
import Benefits from '@/layouts/landing/benefits.vue';

</script>

<template>
    <main class="w-full bg-white">
        <HeaderLanding />
        <Welcome>
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
        </Welcome>
        <div class="bg-gray-100">

            <div id="benefits" class="bg-[#ff7539] px-0 pt-20 pb-40 mt-10 md:pt-20 text-center text-white">
                <h2 class="text-3xl md:text-5xl font-extrabold text-center ">
                    ¿Por qué financiar con <span class="text-[#000000]">Nuestra Empresa</span>?
                </h2>
                <p class="font-semibold mt-4 text-xl md:text-3xl">Algunos de nuestros beneficios</p>
            </div>

            <Benefits />

            <router-link to="/login" data-aos="fade-up"
                class="my-16 mx-auto md:w-[30%] bg-[#FF7539] hover:text-[#FF7539] hover:bg-white transition-all text-white font-bold w-full text-center h-[60px] grid place-items-center rounded-3xl">
                <p>Iniciar Sesión</p>
            </router-link>

            <section id="Motos" class="py-32 bg-white">
                <div class="max-w-6xl mx-auto px-6 text-center">

                    <h2 class="text-3xl md:text-5xl font-extrabold text-center mb-16">
                        Motos <span class="text-[#FF7539]">Disponibles</span>
                    </h2>

                    <div class="grid md:grid-cols-3 gap-10">
                        <CardItem
                            image="https://preview.redd.it/pgvqq1673u191.jpg?width=1080&crop=smart&auto=webp&s=25cdaf7f4692f819cee19496ca3c87a6971123dc"
                            title="Yamaha MT-07" description="Deportiva y versátil para ciudad o carretera." />
                        <CardItem
                            image="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Honda_CB500_twin.jpg/500px-Honda_CB500_twin.jpg"
                            title="Honda CB500" description="Equilibrio perfecto entre potencia y confort." />
                        <CardItem
                            image="https://mcn-images.bauersecure.com/wp-images/4466/1440x960/gsx-s750.jpg?mode=max&quality=90&scale=down"
                            title="Suzuki GSX-S750" description="Diseñada para quienes buscan adrenalina." />
                    </div>
                </div>
            </section>

            <section id="Carros" class="py-20 bg-gray-100">
                <div class="max-w-6xl mx-auto px-6 text-center">

                    <h2 class="text-3xl md:text-5xl font-extrabold text-center mb-16">
                        Carros <span class="text-[#FF7539]">Disponibles</span>
                    </h2>

                    <div class="grid md:grid-cols-3 gap-10">
                        <CardItem
                            image="https://acnews.blob.core.windows.net/imgnews/large/NAZ_0c11779a0db545558af3bdcd55df69c5.jpg"
                            title="Audi A3" description="Elegancia, confort y tecnología alemana." />
                        <CardItem
                            image="https://cdn.sanity.io/images/90qxor39/production/d727bb2e9d8a075a43772a0080e0344a2aa72f04-800x450.jpg?w=800&h=450&q=75&fit=max&auto=format"
                            title="Toyota Corolla" description="Eficiencia y confiabilidad para tu día a día." />
                        <CardItem
                            image="https://www.topgear.com/sites/default/files/cars-car/image/2024/12/54196859052_9249719e93_o.jpg"
                            title="Ford Mustang" description="Potencia y estilo en cada kilómetro." />
                    </div>
                </div>
            </section>


            <Requeriments />

        </div>
        <footer class="bg-gray-900 text-gray-400 text-center py-6">
            <p>© 2025 RentaAuto. Todos los derechos reservados.</p>
        </footer>
    </main>
</template>
