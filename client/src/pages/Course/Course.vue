<template>
  <div class="pb-[120px] border-b-[1px] border-borderColor">
    <CourseFinder />
    <div class="relative mt-[-160px]">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-7">
          <div class="col-span-4" v-for="i in 9" :key="i">
            <CourseCardV2 />
          </div>
        </div>
        <Pagination />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import CourseFinder from '@/components/Course/CourseFinder/CourseFinder.vue'
import CourseCardV2 from '@/components/Course/CourseCard/CourseCardV2.vue'
import Pagination from '@/components/Pagination/Pagination.vue'
export default defineComponent({
  components: { CourseFinder, CourseCardV2, Pagination },
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 0 })
    }
  },
  created() {
    this.scrollToTop()
  }
})
</script>

<style></style>
