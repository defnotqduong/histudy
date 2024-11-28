<template>
  <div class="p-4 md:p-6 bg-whiteColor rounded-md overflow-hidden shadow-shadow01">
    <img :src="thumbnail_url" alt="Course Thumbnail" class="w-full h-60 sm:h-80 md:h-[400px] object-cover object-center" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    thumbnail_url: String
  },
  setup(props) {}
})
</script>

<style></style>
