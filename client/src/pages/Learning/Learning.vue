<template>
  <div class="relative">
    <template v-if="loading">
      <div class="w-screen h-screen flex items-center justify-center text-primaryColor">
        <span class="loading loading-spinner loading-md"></span>
      </div>
    </template>
    <template v-else>
      <LearningHeader :course="course" />
      <div class="fixed top-0 left-0 right-0 bottom-0 z-10 mt-12 mb-14">
        <div class="w-full h-full flex items-start justify-start">
          <LearningSideBar :course="course" :chapters="chapters" :currentLesson="currentLesson?.info" :isShowSideBar="isShowSideBar" />
          <div class="h-full flex-1 relative">
            <LearningContent :lesson="currentLesson" />
          </div>
        </div>
      </div>
      <div class="fixed bottom-0 left-0 right-0 z-20">
        <LearningFooter :currentLesson="currentLesson?.info" :isShowSideBar="isShowSideBar" :toggleSideBar="toggleSideBar" />
      </div>
      <div class="fixed bottom-20 right-8 z-20">
        <NotesAndDiscussion />
      </div>
    </template>
  </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useUserStore, useHomeStore } from '@/stores'
import { getLearningInfo, getLessonInfo } from '@/webServices/learningService'

import LearningHeader from '@/components/Learning/LearningHeader.vue'
import LearningContent from '@/components/Learning/LearningContent.vue'
import NotesAndDiscussion from '@/components/Learning/NotesAndDiscussion.vue'
import LearningSideBar from '@/components/Learning/LearningSideBar.vue'
import LearningFooter from '@/components/Learning/LearningFooter.vue'

export default defineComponent({
  components: { LearningHeader, LearningSideBar, LearningContent, NotesAndDiscussion, LearningFooter },
  setup() {
    const userStore = useUserStore()
    const homeStore = useHomeStore()
    const route = useRoute()
    const router = useRouter()

    const slug = ref(route.params.slug)
    const course = ref(null)
    const chapters = ref([])
    const currentLesson = ref(null)
    const loading = ref(false)
    const isShowSideBar = ref(true)

    const toggleSideBar = () => {
      isShowSideBar.value = !isShowSideBar.value
    }

    const getCurrentLesson = async id => {
      const lessonInfoRes = await getLessonInfo(id)

      console.log('lesson', lessonInfoRes)

      currentLesson.value = lessonInfoRes.lesson
    }

    const fetchData = async () => {
      loading.value = true

      const res = await getLearningInfo(slug.value)

      console.log('course', res)

      if (!res.success) {
        router.push({ name: 'home' })
        return
      }

      course.value = res.course
      chapters.value = res.chapters

      let foundLesson = null

      for (const chapter of chapters.value) {
        const lesson = chapter.lessons.find(lesson => lesson.is_completed !== true && lesson.is_completed !== 1)
        if (lesson) {
          foundLesson = lesson
          break
        }
      }
      if (foundLesson) {
        await getCurrentLesson(foundLesson.id)
      }

      loading.value = false
    }

    onMounted(async () => {
      await fetchData()
    })

    return {
      course,
      chapters,
      currentLesson,
      loading,
      isShowSideBar,
      toggleSideBar
    }
  }
})
</script>

<style></style>
