<template>
  <div class="mt-8 p-7 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
    <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-[1px] border-borderColor">Description</h4>
    <div class="prose" v-html="description"></div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    description: String
  }
})
</script>

<style></style>
