<template>
  <div class="relative">
    <LessonHeader />
    <div class="fixed top-0 left-0 right-0 bottom-0 z-10 mt-12 mb-14">
      <div class="w-full h-full flex items-start justify-start">
        <LessonSideBar />
        <div class="h-full flex-1">
          <LessonContent />
        </div>
      </div>
    </div>
    <div class="fixed bottom-0 left-0 right-0 z-20">
      <LessonFooter />
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import LessonHeader from '@/components/Lesson/LessonHeader.vue'
import LessonContent from '@/components/Lesson/LessonContent.vue'
import LessonSideBar from '@/components/Lesson/LessonSideBar.vue'
import LessonFooter from '@/components/Lesson/LessonFooter.vue'

export default defineComponent({
  components: { LessonHeader, LessonSideBar, LessonContent, LessonFooter }
})
</script>

<style></style>
