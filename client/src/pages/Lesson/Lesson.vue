<template>
  <div class="relative">
    <LessonHeader />
    <div class="fixed top-0 left-0 right-0 bottom-0 mt-14">
      <div class="w-full h-full flex items-start justify-start">
        <div class="h-full flex-1">
          <LessonContent />
        </div>
        <LessonSideBar />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import LessonHeader from '@/components/Lesson/LessonHeader.vue'
import LessonContent from '@/components/Lesson/LessonContent.vue'
import LessonSideBar from '@/components/Lesson/LessonSideBar.vue'

export default defineComponent({
  components: { LessonHeader, LessonSideBar, LessonContent }
})
</script>

<style></style>
