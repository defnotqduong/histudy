<template>
  <section class="py-24">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12">
        <div class="col-span-5 flex flex-col items-start">
          <span class="inline-block px-5 py-2 mb-5 text-sm text-secondaryColor font-bold uppercase bg-secondaryOpacityColor rounded-full">Blog Post</span>
          <h2 class="text-[40px] font-black text-headingColor leading-tight">Have a look on <span class="text-secondaryColor">our News</span></h2>
        </div>
        <div class="col-span-7 flex items-end justify-end">
          <ButtonV4 :content="'View All Articles'" :link="'home'" />
        </div>
      </div>
      <div class="grid grid-cols-12 mt-10 gap-7">
        <div class="col-span-6">
          <BlogCardV1 />
        </div>
        <div class="col-span-6 flex flex-col gap-7 items-start justify-start">
          <BlogCardV2 v-for="i in 3" :key="i" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import ButtonV4 from '@/components/Button/ButtonV4.vue'
import BlogCardV1 from '@/components/Blog/BlogCardV1.vue'
import BlogCardV2 from '@/components/Blog/BlogCardV2.vue'
export default defineComponent({
  components: { ButtonV4, BlogCardV1, BlogCardV2 }
})
</script>

<style></style>
