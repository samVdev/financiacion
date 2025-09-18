<template>
  <section class="overflow-hidden h-[80vh] md:h-[100vh]">
    <Carousel v-bind="config" class="h-full carousel-container">
      <Slide v-for="(img, i) in images" :key="i" class="h-full slide-item">
        <img :src="img" alt="" class="imgCarrousel" />
      </Slide>
    </Carousel>
  </section>
</template>

<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide } from 'vue3-carousel'

const config = {
  itemsToShow: 1,
  autoplay: 3000,
  wrapAround: true,
  transition: 800,
}

const images = [
  '/banners/banner_1.png',
  '/banners/banner_2.png',
  '/banners/banner_3.png',
]
</script>

<style scoped>
.carousel-container {
  height: 100%;
}

.slide-item {
  height: 100%;
}

.imgCarrousel {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>
