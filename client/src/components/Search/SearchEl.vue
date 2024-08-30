<template>
  <div class="container mx-auto px-4">
    <div class="max-w-[900px] my-4 mx-auto px-4">
      <form class="mt-7 flex items-center justify-center">
        <input
          type="text"
          v-model="keyword"
          class="flex-1 outline-none px-4 mr-3 h-12 text-headingColor border-[1.5px] border-borderColor rounded-md placeholder:text-base placeholder:text-bodyColor placeholder:font-medium transition-all duration-300 focus:border-primaryColor"
          placeholder="What are you looking for?"
        />
        <GradientButtonV2 :func="search" :content="'Search'" :loading="loading" />
      </form>
      <div class="mt-7">
        <hr class="h-[1.5px] w-full bg-borderColor" />
      </div>
      <div class="pt-7 pb-14">
        <h5 class="text-xs font-bold text-headingColor uppercase opacity-50 tracking-wide">OUR TOP COURSE</h5>
        <div class="h-[60vh] overflow-y-auto">
          <div v-if="courses.length === 0" class="mt-4 ml-6 italic">No courses yet</div>
          <div v-else class="grid grid-cols-4 gap-4 mt-4">
            <div class="col-span-1" v-for="course in courses" :key="course.id" @click="onChangeSearchEl">
              <CourseCardV1 :course="course" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from 'vue'
import { useHomeStore } from '@/stores'
import { searchCourses } from '@/webServices/courseService'

import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'
import CourseCardV1 from '@/components/Course/CourseCard/CourseCardV1.vue'

export default defineComponent({
  components: { GradientButtonV2, CourseCardV1 },
  props: {
    onChangeSearchEl: Function
  },
  setup() {
    const homeStore = useHomeStore()

    const keyword = ref('')
    const loading = ref(false)
    const courses = ref([...homeStore.popularCourses.slice(0, Math.min(homeStore.popularCourses.length, 4))])

    const search = async () => {
      if (!keyword.value.trim()) {
        courses.value = []
        return
      }

      loading.value = true
      const res = await searchCourses(keyword.value)

      if (res.success) courses.value = res.courses

      loading.value = false
    }

    return { keyword, loading, courses, search }
  }
})
</script>

<style></style>
