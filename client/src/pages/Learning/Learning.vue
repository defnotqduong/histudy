<template>
  <div class="relative">
    <template v-if="loading">
      <div class="w-screen h-screen flex items-center justify-center text-primaryColor">
        <span class="loading loading-spinner loading-md"></span>
      </div>
    </template>
    <template v-else>
      <LearningHeader :course="course" :slug="slug" />
      <div class="fixed top-0 left-0 right-0 bottom-0 z-10 mt-12 mb-14">
        <div class="w-full h-full flex items-start justify-start">
          <LearningSideBar
            :course="course"
            :chapters="chapters"
            :currentLesson="currentLesson?.info"
            :prevLessonId="prevLessonId"
            :nextLessonId="nextLessonId"
            :getCurrentLesson="getCurrentLesson"
            :isShowSideBar="isShowSideBar"
            :getAssessmentList="getAssessmentList"
          />
          <div class="h-full flex-1 relative">
            <LearningContent v-if="currentLesson" :lesson="currentLesson" :updateStatusLesson="updateStatusLesson" />
            <LearningAssessment
              v-else
              :slug="slug"
              :assessments="assessments"
              :currentAssessment="currentAssessment"
              :currentCompletedAssessment="currentCompletedAssessment"
              :getAssessmentCurrent="getAssessmentCurrent"
              :getAssessmentCompleted="getAssessmentCompleted"
              :submitAss="submitAss"
            />
          </div>
          <LessonDiscussionModal
            v-if="isShowLessonDiscussionModal"
            :currentLesson="currentLesson?.info"
            :discussions="discussions"
            :updateDiscussions="updateDiscussions"
            :isShowLessonDiscussionModal="isShowLessonDiscussionModal"
            :toggleLessonDiscussionModal="toggleLessonDiscussionModal"
          />
          <LessonNoteModal
            v-if="isShowLessonNoteModal"
            :currentLesson="currentLesson?.info"
            :notes="notes"
            :updateNotes="updateNotes"
            :isShowLessonNoteModal="isShowLessonNoteModal"
            :toggleLessonNoteModal="toggleLessonNoteModal"
          />
          <CourseReviewModal
            v-if="isShowCourseReviewModal"
            :courseId="course?.id"
            :review="review"
            :updateReview="updateReview"
            :isShowCourseReviewModal="isShowCourseReviewModal"
            :toggleCourseReviewModal="toggleCourseReviewModal"
          />
          <ActionPanel
            :isShowLDiscModal="isShowLessonDiscussionModal"
            :isShowLNoteModal="isShowLessonNoteModal"
            :isShowCReviewModal="isShowCourseReviewModal"
            :toggleLessonDiscussionModal="toggleLessonDiscussionModal"
            :toggleLessonNoteModal="toggleLessonNoteModal"
            :toggleCourseReviewModal="toggleCourseReviewModal"
          />
        </div>
      </div>
      <div class="fixed bottom-0 left-0 right-0 z-20">
        <LearningFooter
          :slug="slug"
          :currentLesson="currentLesson?.info"
          :prevLessonId="prevLessonId"
          :nextLessonId="nextLessonId"
          :getCurrentLesson="getCurrentLesson"
          :isShowSideBar="isShowSideBar"
          :toggleSideBar="toggleSideBar"
          :getAssessmentList="getAssessmentList"
        />
      </div>
    </template>
  </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useUserStore, useHomeStore } from '@/stores'
import { getLearningInfo, getLessonInfo, getAssessments, getAssessment, getCompletedAssessment, submitAssessment } from '@/webServices/learningService'

import LearningHeader from '@/components/Learning/LearningHeader.vue'
import LearningContent from '@/components/Learning/LearningContent.vue'
import ActionPanel from '@/components/Learning/ActionPanel.vue'
import LearningSideBar from '@/components/Learning/LearningSideBar.vue'
import LearningFooter from '@/components/Learning/LearningFooter.vue'
import LessonNoteModal from '@/components/Learning/LessonNoteModal.vue'
import LessonDiscussionModal from '@/components/Learning/LessonDiscussionModal.vue'
import CourseReviewModal from '@/components/Learning/CourseReviewModal.vue'
import LearningAssessment from '@/components/Learning/LearningAssessment.vue'

export default defineComponent({
  components: {
    LearningHeader,
    LearningSideBar,
    LearningContent,
    ActionPanel,
    LearningFooter,
    LessonNoteModal,
    LessonDiscussionModal,
    CourseReviewModal,
    LearningAssessment
  },
  setup() {
    const userStore = useUserStore()
    const homeStore = useHomeStore()
    const route = useRoute()
    const router = useRouter()

    const slug = ref(route.params.slug)
    const course = ref(null)
    const review = ref(null)
    const chapters = ref([])
    const assessments = ref([])
    const currentAssessment = ref(null)
    const currentCompletedAssessment = ref(null)
    const currentLesson = ref(null)
    const prevLessonId = ref(null)
    const nextLessonId = ref(null)
    const discussions = ref([])
    const notes = ref([])
    const loading = ref(false)
    const isShowSideBar = ref(true)
    const isShowLessonDiscussionModal = ref(false)
    const isShowLessonNoteModal = ref(false)
    const isShowCourseReviewModal = ref(false)

    const toggleSideBar = () => {
      isShowSideBar.value = !isShowSideBar.value
    }

    const toggleLessonDiscussionModal = () => {
      isShowLessonDiscussionModal.value = !isShowLessonDiscussionModal.value
      isShowLessonNoteModal.value = false
      isShowCourseReviewModal.value = false
    }

    const toggleLessonNoteModal = () => {
      isShowLessonNoteModal.value = !isShowLessonNoteModal.value
      isShowLessonDiscussionModal.value = false
      isShowCourseReviewModal.value = false
    }

    const toggleCourseReviewModal = () => {
      isShowCourseReviewModal.value = !isShowCourseReviewModal.value
      isShowLessonDiscussionModal.value = false
      isShowLessonNoteModal.value = false
    }

    const updateStatusLesson = () => {
      const updatedChapters = chapters.value.map(chapter => {
        const updatedLessons = chapter.lessons.map(lesson => {
          if (lesson.id === currentLesson.value?.info?.id) {
            return { ...lesson, is_completed: 1 }
          }
          return lesson
        })

        return { ...chapter, lessons: updatedLessons }
      })

      chapters.value = updatedChapters
    }

    const updateDiscussions = arr => {
      discussions.value = arr
    }

    const updateNotes = arr => {
      notes.value = arr
    }

    const updateReview = rv => {
      review.value = rv
    }

    const getAssessmentList = async () => {
      const res = await getAssessments(slug.value)
      if (res.success) {
        assessments.value = res.assessments
        currentLesson.value = null
        discussions.value = []
        notes.value = []
        prevLessonId.value = prevLessonId.value + 1
        currentAssessment.value = null
        currentCompletedAssessment.value = null
      }
    }

    const getAssessmentCurrent = async id => {
      const res = await getAssessment(slug.value, id)
      if (res.success) currentAssessment.value = { ...res.assessment, questions: res.questions }
    }

    const getAssessmentCompleted = async id => {
      const res = await getCompletedAssessment(slug.value, id)
      if (res.success)
        currentCompletedAssessment.value = {
          assessment: res.assessment,
          questions: res.questions,
          userAnswers: res.userAnswers,
          userAssessment: res.userAssessment
        }
    }

    const submitAss = async data => {
      const res = await submitAssessment(slug.value, currentAssessment.value.id, data)
      if (res.success) {
        await getAssessmentList()
        currentAssessment.value = null
      }
    }

    const getCurrentLesson = async id => {
      if (!id) return

      const lessonInfoRes = await getLessonInfo(id)

      if (!lessonInfoRes.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: lessonInfoRes.data.message })
        return
      }

      currentLesson.value = lessonInfoRes.lesson
      prevLessonId.value = lessonInfoRes.previous_lesson_id
      nextLessonId.value = lessonInfoRes.next_lesson_id
      discussions.value = lessonInfoRes.lesson.discussions
      notes.value = lessonInfoRes.lesson.notes

      currentAssessment.value = null
      currentCompletedAssessment.value = null
    }

    const fetchData = async () => {
      loading.value = true

      const res = await getLearningInfo(slug.value)

      if (!res.success) {
        router.push({ name: 'home' })
        return
      }

      course.value = res.course
      review.value = res.review
      chapters.value = res.chapters
      let foundLesson = null

      for (const chapter of chapters.value) {
        const lesson = chapter.lessons.find(lesson => lesson.is_completed !== true && lesson.is_completed !== 1)
        if (lesson) {
          foundLesson = lesson
          break
        }
      }

      if (!foundLesson && chapters.value.length > 0) {
        const lastChapter = chapters.value[chapters.value.length - 1]
        if (lastChapter.lessons.length > 0) {
          foundLesson = lastChapter.lessons[lastChapter.lessons.length - 1]
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
      slug,
      review,
      chapters,
      currentLesson,
      assessments,
      currentAssessment,
      currentCompletedAssessment,
      prevLessonId,
      nextLessonId,
      discussions,
      notes,
      loading,
      isShowSideBar,
      isShowLessonNoteModal,
      isShowLessonDiscussionModal,
      isShowCourseReviewModal,
      toggleCourseReviewModal,
      toggleSideBar,
      toggleLessonNoteModal,
      toggleLessonDiscussionModal,
      getCurrentLesson,
      updateStatusLesson,
      updateDiscussions,
      updateNotes,
      updateReview,
      getAssessmentList,
      getAssessmentCurrent,
      getAssessmentCompleted,
      submitAss
    }
  }
})
</script>

<style></style>
