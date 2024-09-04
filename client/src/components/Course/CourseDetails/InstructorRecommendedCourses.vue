<template>
  <div v-if="instructorCourses.length > 0" class="mt-20">
    <span class="inline-block px-5 py-2 mb-5 text-xs md:text-sm text-pinkColor font-bold uppercase bg-pinkOpacityColor rounded-full">Top Course</span>
    <div class="flex items-center justify-between gap-4">
      <div class="flex flex-col items-start">
        <h2 class="text-lg sm:text-xl md:text-3xl font-black text-headingColor leading-tight line-clamp-2">
          More Course By <span class="text-primaryColor">{{ instructor?.name }}</span>
        </h2>
      </div>
      <div class="flex items-end justify-end">
        <ButtonV3 :content="'View Courses'" :link="'courses'" />
      </div>
    </div>
    <div class="grid grid-cols-12 mt-10 gap-4 md:gap-6">
      <div class="col-span-12 sm:col-span-6" v-for="course in instructorCourses" :key="course.id">
        <CourseCardV3 :course="course" />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import CourseCardV3 from '@/components/Course/CourseCard/CourseCardV3.vue'
import ButtonV3 from '@/components/Button/ButtonV3.vue'
export default defineComponent({
  components: { CourseCardV3, ButtonV3 },
  props: {
    instructor: Object,
    instructorCourses: Array
  }
})
</script>

<style></style>
