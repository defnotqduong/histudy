<template>
  <section class="py-24 bg-whiteColor">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-center justify-center">
        <span class="inline-block px-5 py-2 mb-5 text-xs md:text-sm text-primaryColor font-bold uppercase bg-primaryOpacityColor rounded-full">Categories</span>
        <h2 class="text-center text-2xl md:text-3xl lg:text-[40px] lg:leading-tight font-black text-headingColor">
          Explore Top Courses Caterories <br />
          That Change Yourself
        </h2>
      </div>
      <div class="grid grid-cols-12 mt-14 gap-3 md:gap-7">
        <div class="col-span-6 md:col-span-4 xl:col-span-3" v-for="topic in topics" :key="topic.id">
          <TopicCard :topic="topic" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import TopicCard from '@/components/Topic/TopicCard.vue'
import webDesign from '@/assets/images/web-design.jpg'
import design from '@/assets/images/design.jpg'
import personal from '@/assets/images/personal.jpg'
import server from '@/assets/images/server.jpg'
import pantone from '@/assets/images/pantone.jpg'
import paintPalette from '@/assets/images/paint-palette.jpg'
import smartphone from '@/assets/images/smartphone.jpg'
import infographic from '@/assets/images/infographic.jpg'

export default defineComponent({
  components: { TopicCard },
  setup() {
    const topics = [
      {
        id: 1,
        url: webDesign,
        title: 'Web Design',
        link: 'home',
        content: 1
      },
      {
        id: 2,
        url: design,
        title: 'Backend',
        link: 'home',
        content: 2
      },
      {
        id: 3,
        url: personal,
        title: 'Full Stack',
        link: 'home',
        content: 1
      },
      {
        id: 4,
        url: server,
        title: 'Mobile Application',
        link: 'home',
        content: 1
      },
      {
        id: 5,
        url: pantone,
        title: 'Backend',
        link: 'home',
        content: 2
      },
      {
        id: 6,
        url: paintPalette,
        title: 'Finance & Accounting',
        link: 'home',
        content: 3
      },
      {
        id: 7,
        url: smartphone,
        title: 'Graphic Design',
        link: 'home',
        content: 1
      },
      {
        id: 8,
        url: infographic,
        title: 'Cloud',
        link: 'home',
        content: 1
      }
    ]

    return { topics }
  }
})
</script>

<style></style>
