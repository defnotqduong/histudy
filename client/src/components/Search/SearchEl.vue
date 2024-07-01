<template>
  <div class="container mx-auto px-4">
    <div class="max-w-[900px] my-4 mx-auto px-4">
      <form class="mt-7 flex items-center justify-center">
        <input
          type="text"
          class="flex-1 outline-none px-4 mr-3 h-12 text-headingColor border-[1.5px] border-borderColor rounded-md placeholder:text-base placeholder:text-bodyColor placeholder:font-medium transition-all duration-300 focus:border-primaryColor"
          placeholder="What are you looking for?"
        />
        <GradientButtonV2 :func="search" :content="'Search'" />
      </form>
      <div class="mt-7">
        <hr class="h-[1.5px] w-full bg-borderColor" />
      </div>
      <div class="pt-7 pb-14">
        <h5 class="text-xs font-bold text-headingColor uppercase opacity-50 tracking-wide">OUR TOP COURSE</h5>
        <div class="grid grid-cols-4 gap-4 mt-4">
          <div class="col-span-1" v-for="i in 4" :key="i" @click="onChangeSearchEl">
            <CourseCardV1 />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'
import CourseCardV1 from '../CourseCard/CourseCardV1.vue'

export default defineComponent({
  props: {
    onChangeSearchEl: Function
  },
  components: { GradientButtonV2, CourseCardV1 },
  setup() {
    const search = () => {
      alert('Search')
    }

    return {
      search
    }
  }
})
</script>

<style></style>
