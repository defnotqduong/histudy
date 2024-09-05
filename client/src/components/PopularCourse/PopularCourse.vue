<template>
  <section class="py-24 bg-extraColor">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12">
        <div class="col-span-8 flex flex-col items-start">
          <span class="inline-block px-5 py-2 mb-5 text-xs md:text-sm text-pinkColor font-bold uppercase bg-pinkOpacityColor rounded-full"
            >Top Popular Course</span
          >
          <h2 class="text-2xl md:text-3xl lg:text-[40px] lg:leading-tight font-black text-headingColor">
            Most Popular <span class="text-primaryColor">Course</span>
          </h2>
        </div>
        <div class="col-span-4 flex items-end justify-end">
          <ButtonV3 :content="'View Courses'" :func="redirect" />
        </div>
      </div>
      <div class="grid grid-cols-12 mt-14 gap-4 md:gap-6">
        <div class="col-span-12 sm:col-span-6 lg:col-span-4" v-for="course in homeStore.popularCourses" :key="course.id">
          <CourseCardV3 :course="course" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'

import ButtonV3 from '@/components/Button/ButtonV3.vue'
import CourseCardV2 from '@/components/Course/CourseCard/CourseCardV2.vue'
import CourseCardV3 from '@/components/Course/CourseCard/CourseCardV3.vue'
export default defineComponent({
  components: { ButtonV3, CourseCardV2, CourseCardV3 },
  setup() {
    const router = useRouter()
    const homeStore = useHomeStore()

    const redirect = () => {
      router.push({ name: 'courses' })
    }

    return { homeStore, redirect }
  }
})
</script>

<style></style>
