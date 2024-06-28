<template>
  <section class="py-24">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-center justify-center">
        <span class="inline-block px-5 py-2 mb-4 text-sm text-primaryColor font-bold uppercase bg-primaryOpacityColor rounded-full">Categories</span>
        <h2 class="text-center text-[40px] font-black text-headingColor leading-tight">
          Explore Top Courses Caterories <br />
          That Change Yourself
        </h2>
      </div>
      <div class="grid grid-cols-12 mt-14 gap-7">
        <div class="col-span-3" v-for="toppic in toppics" :key="toppic.id">
          <ToppicCard :toppic="toppic" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import ToppicCard from '@/components/Toppic/ToppicCard.vue'
export default defineComponent({
  components: { ToppicCard },
  setup() {
    const toppics = [
      {
        id: 1,
        url: '/src/assets/images/web-design.jpg',
        title: 'Web Design',
        link: 'home',
        content: 1
      },
      {
        id: 2,
        url: '/src/assets/images/design.jpg',
        title: 'Backend',
        link: 'home',
        content: 2
      },
      {
        id: 3,
        url: '/src/assets/images/personal.jpg',
        title: 'Full Stack',
        link: 'home',
        content: 1
      },
      {
        id: 4,
        url: '/src/assets/images/server.jpg',
        title: 'Mobile Application',
        link: 'home',
        content: 1
      },
      {
        id: 5,
        url: '/src/assets/images/pantone.jpg',
        title: 'Backend',
        link: 'home',
        content: 2
      },
      {
        id: 6,
        url: '/src/assets/images/paint-palette.jpg',
        title: 'Finance & Accounting',
        link: 'home',
        content: 3
      },
      {
        id: 7,
        url: '/src/assets/images/smartphone.jpg',
        title: 'Graphic Design',
        link: 'home',
        content: 1
      },
      {
        id: 8,
        url: '/src/assets/images/infographic.jpg',
        title: 'Cloud',
        link: 'home',
        content: 1
      }
    ]

    return { toppics }
  }
})
</script>

<style></style>
