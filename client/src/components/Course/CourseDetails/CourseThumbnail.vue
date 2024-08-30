<template>
  <div class="p-7 bg-whiteColor rounded-md overflow-hidden shadow-shadow01">
    <img :src="thumbnail_url" alt="Course Thumbnail" class="w-full h-[460px] object-cover object-center" />
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
