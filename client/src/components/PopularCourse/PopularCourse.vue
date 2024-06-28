<template>
  <section class="py-24 bg-extraColor">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12">
        <div class="col-span-6 flex flex-col items-start">
          <span class="inline-block px-5 py-2 mb-4 text-sm text-pinkColor font-bold uppercase bg-pinkOpacityColor rounded-full">Top Popular Course</span>
          <h2 class="text-center text-[40px] font-black text-headingColor leading-tight">Most Popular <span class="text-primaryColor">Course</span></h2>
        </div>
        <div class="col-span-6 flex items-end justify-end">
          <ButtonV3 :content="'View All Course'" :link="'home'" />
        </div>
      </div>
      <div class="grid grid-cols-12 mt-14 gap-7">
        <div class="col-span-4" v-for="i in 6" :key="i">
          <CourseCardV2 />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import ButtonV3 from '@/components/Button/ButtonV3.vue'
import CourseCardV2 from '@/components/CourseCard/CourseCardV2.vue'
export default defineComponent({
  components: { ButtonV3, CourseCardV2 },
  setup() {}
})
</script>

<style></style>
