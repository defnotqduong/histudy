<template>
  <div v-if="relatedCourses.length > 0" class="container mx-auto px-4">
    <span class="inline-block px-5 py-2 mb-5 text-xs md:text-sm text-primaryColor font-bold uppercase bg-primaryOpacityColor rounded-full"
      >MORE SIMILAR COURSES</span
    >
    <div class="flex items-center justify-between">
      <div class="flex flex-col items-start">
        <h2 class="text-2xl md:text-3xl font-black text-headingColor leading-tight">Related Courses</h2>
      </div>
    </div>
    <div class="grid grid-cols-12 mt-10 gap-4 md:gap-6">
      <div class="col-span-12 sm:col-span-6 lg:col-span-4" v-for="course in relatedCourses" :key="course.id">
        <CourseCardV2 :course="course" />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import CourseCardV2 from '@/components/Course/CourseCard/CourseCardV2.vue'

export default defineComponent({
  components: { CourseCardV2 },
  props: {
    relatedCourses: Array
  }
})
</script>

<style></style>
