<template>
  <div class="flex items-start justify-start">
    <LessonLeftSideBar />
    <LessonContent class="flex-1" />
    <LessonRightSideBar />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import LessonContent from '@/components/Lesson/LessonContent.vue'
import LessonLeftSideBar from '@/components/Lesson/LessonLeftSideBar.vue'
import LessonRightSideBar from '@/components/Lesson/LessonRightSideBar.vue'

export default defineComponent({
  components: { LessonLeftSideBar, LessonContent, LessonRightSideBar }
})
</script>

<style></style>
