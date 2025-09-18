<template>
  <section class="h-[80vh] md:h-[100vh] overflow-hidden">
    <Carousel v-bind="config">
      <Slide v-for="(img, i) in images" :key="i">
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
  autoplay: 2000,
  wrapAround: true,
  transition: 400, // duración del fade en ms
}

const images = [
  '/banners/banner_1.png',
  '/banners/banner_2.png',
  '/banners/banner_3.png',
]
</script>

<style scoped>
.imgCarrousel {
  @apply w-full h-full object-cover;
}
</style>
