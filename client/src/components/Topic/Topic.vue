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
        <div class="col-span-6 md:col-span-4 xl:col-span-3" v-for="topic in homeStore.topics" :key="topic.id">
          <TopicCard :topic="topic" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'
import TopicCard from '@/components/Topic/TopicCard.vue'

export default defineComponent({
  components: { TopicCard },
  setup() {
    const homeStore = useHomeStore()

    return {
      homeStore
    }
  }
})
</script>

<style></style>
