<template>
  <section class="py-24">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12">
        <div class="col-span-6 flex flex-col items-start">
          <span class="inline-block px-5 py-2 mb-5 text-xs md:text-sm text-secondaryColor font-bold uppercase bg-secondaryOpacityColor rounded-full"
            >Blog Post</span
          >
          <h2 class="text-2xl md:text-3xl lg:text-[40px] lg:leading-tight font-black text-headingColor">
            Have a look on <span class="text-secondaryColor">our News</span>
          </h2>
        </div>
        <div class="col-span-6 flex items-end justify-end">
          <ButtonV4 :content="'View Articles'" :link="'home'" />
        </div>
      </div>
      <div class="grid grid-cols-12 mt-10 gap-7">
        <div class="col-span-12 lg:col-span-6">
          <BlogCardV1 />
        </div>
        <div class="col-span-12 lg:col-span-6">
          <div class="flex flex-col gap-7 items-start justify-start">
            <BlogCardV2 v-for="i in 3" :key="i" class="w-full" />
          </div>
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
