<template>
  <div class="relative py-2 bg-extraColor border-t-[1px] border-borderColor">
    <button @click.prevent="toggle" class="absolute top-1/2 -translate-y-1/2 left-8">
      <span class="flex items-center justify-center gap-2 text-headingColor font-bold transition-all duration-300 hover:text-primaryColor">
        <svg v-if="isShowSideBar" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 24 24">
          <path
            d="M1.293,12.707a1,1,0,0,1-.216-.325.986.986,0,0,1,0-.764,1,1,0,0,1,.216-.325l8-8a1,1,0,1,1,1.414,1.414L4.414,11H22a1,1,0,0,1,0,2H4.414l6.293,6.293a1,1,0,0,1-1.414,1.414Z"
          />
        </svg>
        <svg v-else xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
          <path d="M3 12H21M3 6H21M3 18H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        {{ currentLesson?.title }}
      </span>
    </button>
    <div class="flex items-center justify-center gap-4">
      <PrevButton :content="'Previous'" :func="prev" class="h-10" :class="!prevLessonId ? 'cursor-not-allowed' : ''" />
      <NextButton :content="'Next'" :func="next" class="h-10" :class="!nextLessonId ? 'cursor-not-allowed' : ''" />
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import NextButton from '@/components/Button/NextButton.vue'
import PrevButton from '@/components/Button/PrevButton.vue'

export default defineComponent({
  components: { NextButton, PrevButton },
  props: {
    currentLesson: Object,
    prevLessonId: Number,
    nextLessonId: Number,
    getCurrentLesson: Function,
    isShowSideBar: Boolean,
    toggleSideBar: Function
  },
  setup(props) {
    const toggle = () => {
      props.toggleSideBar()
    }

    const next = async () => {
      await props.getCurrentLesson(props.nextLessonId)
    }

    const prev = async () => {
      await props.getCurrentLesson(props.prevLessonId)
    }

    return {
      toggle,
      next,
      prev
    }
  }
})
</script>

<style></style>
