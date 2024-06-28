<template>
  <div class="py-24 bg-extraColor">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-start">
        <span class="inline-block px-5 py-2 mb-4 text-sm text-pinkColor font-bold uppercase bg-pinkOpacityColor rounded-full">Top Popular Course</span>
        <h2 class="text-center text-[40px] font-black text-headingColor leading-tight">Most Popular <span class="text-primaryColor">Course</span></h2>
      </div>
      <div class="grid grid-cols-12 mt-14 gap-7">
        <div class="col-span-3" v-for="i in 8" :key="i">
          {{ i }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({})
</script>

<style></style>
