<template>
  <section class="h-auto relative">
    <Carousel ref="carousel" v-bind="config">
      <Slide v-for="(card, i) in cards" :key="i">
        <CardItem
          :image="card.image"
          :title="card.title"
          :description="card.description"
        />
      </Slide>
    </Carousel>

    <!-- Flecha izquierda -->
    <button
      v-if="showArrows"
      @click="goPrev"
      class="absolute left-[-2%] top-1/2 -translate-y-1/2  z-[20]
             bg-orange-500/70 hover:bg-orange-500/90 
             text-white rounded-full w-12 h-12 flex items-center justify-center"
    >
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
           stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
      </svg>
    </button>

    <!-- Flecha derecha -->
    <button
      v-if="showArrows"
      @click="goNext"
      class="absolute right-[-2%] top-1/2 -translate-y-1/2 z-[20]
             bg-orange-500/70 hover:bg-orange-500/90 
             text-white rounded-full w-12 h-12 flex items-center justify-center"
    >
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
           stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
    </button>
  </section>
</template>

<script setup lang="ts">
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide } from "vue3-carousel";
import { ref, computed } from "vue";
import CardItem from "./CardItem.vue";

const carousel = ref<InstanceType<typeof Carousel> | null>(null);

const goNext = () => {
  //@ts-ignore
  carousel.value?.next();
};

const goPrev = () => {
  //@ts-ignore
  carousel.value?.prev();
};

const config = {
  itemsToShow: 1,
  itemsToScroll: 3,
  autoplay: 0,
  wrapAround: false,
  transition: 500,
  breakpoints: {
    768: { itemsToShow: 2 },
    1024: { itemsToShow: 3 },
  },
};

const showArrows = computed(() => {
  const maxVisible = 3;
  return cards.length > maxVisible;
});

const cards = [
  {
    image: "https://preview.redd.it/pgvqq1673u191.jpg?width=1080&crop=smart&auto=webp&s=25cdaf7f4692f819cee19496ca3c87a6971123dc",
    title: "Yamaha MT-07",
    description: "Deportiva y versátil para ciudad o carretera.",
  },
  {
    image: "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Honda_CB500_twin.jpg/500px-Honda_CB500_twin.jpg",
    title: "Honda CB500",
    description: "Equilibrio perfecto entre potencia y confort.",
  },
  {
    image: "https://mcn-images.bauersecure.com/wp-images/4466/1440x960/gsx-s750.jpg?mode=max&quality=90&scale=down",
    title: "Suzuki GSX-S750",
    description: "Diseñada para quienes buscan adrenalina.",
  },
  {
    image: "https://preview.redd.it/pgvqq1673u191.jpg?width=1080&crop=smart&auto=webp&s=25cdaf7f4692f819cee19496ca3c87a6971123dc",
    title: "Yamaha MT-07",
    description: "Deportiva y versátil para ciudad o carretera.",
  },
  {
    image: "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Honda_CB500_twin.jpg/500px-Honda_CB500_twin.jpg",
    title: "Honda CB500",
    description: "Equilibrio perfecto entre potencia y confort.",
  },
  {
    image: "https://mcn-images.bauersecure.com/wp-images/4466/1440x960/gsx-s750.jpg?mode=max&quality=90&scale=down",
    title: "Suzuki GSX-S750",
    description: "Diseñada para quienes buscan adrenalina.",
  },
  {
    image: "https://preview.redd.it/pgvqq1673u191.jpg?width=1080&crop=smart&auto=webp&s=25cdaf7f4692f819cee19496ca3c87a6971123dc",
    title: "Yamaha MT-07",
    description: "Deportiva y versátil para ciudad o carretera.",
  },
  {
    image: "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Honda_CB500_twin.jpg/500px-Honda_CB500_twin.jpg",
    title: "Honda CB500",
    description: "Equilibrio perfecto entre potencia y confort.",
  },
  {
    image: "https://mcn-images.bauersecure.com/wp-images/4466/1440x960/gsx-s750.jpg?mode=max&quality=90&scale=down",
    title: "Suzuki GSX-S750",
    description: "Diseñada para quienes buscan adrenalina.",
  },
  
];
</script>
