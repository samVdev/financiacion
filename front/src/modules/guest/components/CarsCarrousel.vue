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
    image: "https://acnews.blob.core.windows.net/imgnews/large/NAZ_0c11779a0db545558af3bdcd55df69c5.jpg",
    title: "Audi A3",
    description: "Elegancia, confort y tecnología alemana.",
  },
  {
    image: "https://cdn.sanity.io/images/90qxor39/production/d727bb2e9d8a075a43772a0080e0344a2aa72f04-800x450.jpg?w=800&h=450&q=75&fit=max&auto=format",
    title: "Toyota Corolla",
    description: "Eficiencia y confiabilidad para tu día a día.",
  },
  {
    image: "https://www.topgear.com/sites/default/files/cars-car/image/2024/12/54196859052_9249719e93_o.jpg",
    title: "Ford Mustang",
    description: "Potencia y estilo en cada kilómetro.",
  },
  {
    image: "https://acnews.blob.core.windows.net/imgnews/large/NAZ_0c11779a0db545558af3bdcd55df69c5.jpg",
    title: "Audi A3",
    description: "Elegancia, confort y tecnología alemana.",
  },
  {
    image: "https://cdn.sanity.io/images/90qxor39/production/d727bb2e9d8a075a43772a0080e0344a2aa72f04-800x450.jpg?w=800&h=450&q=75&fit=max&auto=format",
    title: "Toyota Corolla",
    description: "Eficiencia y confiabilidad para tu día a día.",
  },
  {
    image: "https://www.topgear.com/sites/default/files/cars-car/image/2024/12/54196859052_9249719e93_o.jpg",
    title: "Ford Mustang",
    description: "Potencia y estilo en cada kilómetro.",
  },
  {
    image: "https://acnews.blob.core.windows.net/imgnews/large/NAZ_0c11779a0db545558af3bdcd55df69c5.jpg",
    title: "Audi A3",
    description: "Elegancia, confort y tecnología alemana.",
  },
  {
    image: "https://cdn.sanity.io/images/90qxor39/production/d727bb2e9d8a075a43772a0080e0344a2aa72f04-800x450.jpg?w=800&h=450&q=75&fit=max&auto=format",
    title: "Toyota Corolla",
    description: "Eficiencia y confiabilidad para tu día a día.",
  },
  {
    image: "https://www.topgear.com/sites/default/files/cars-car/image/2024/12/54196859052_9249719e93_o.jpg",
    title: "Ford Mustang",
    description: "Potencia y estilo en cada kilómetro.",
  },
];

</script>
