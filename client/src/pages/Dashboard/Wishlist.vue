<template>
  <div class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">Wishlist</h4>
    </div>
    <div class="grid grid-cols-12 gap-5">
      <div v-for="i in 6" :key="i" class="col-span-4">
        <CourseCardV5 />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import CourseCardV5 from '@/components/Course/CourseCard/CourseCardV5.vue'

export default defineComponent({
  components: { CourseCardV5 },
  setup() {},
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
