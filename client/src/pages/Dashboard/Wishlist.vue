<template>
  <div class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">Wishlist</h4>
    </div>
    <div class="grid grid-cols-12 gap-5">
      <div v-for="course in userStore.wishlist" :key="course.id" class="col-span-12 sm:col-span-6 lg:col-span-4">
        <CourseCardV6 :course="course" />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useUserStore } from '@/stores'

import CourseCardV6 from '@/components/Course/CourseCard/CourseCardV6.vue'

export default defineComponent({
  components: { CourseCardV6 },
  setup() {
    const userStore = useUserStore()

    return {
      userStore
    }
  },
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
