<template>
  <div class="pt-10 pb-40">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>

    <div v-if="!loading">
      <div class="mb-6 pb-5 flex items-end justify-between border-b-[1px] border-borderColor">
        <h4 class="text-xl text-headingColor font-extrabold">Quiz List</h4>
      </div>
      <div class="p-2 w-[50%] md:flex-1">
        <span class="inline-block mb-2 text-sm text-headingColor font-bold opacity-80 uppercase">Filter by course</span>
        <select class="select w-full" v-model="courseId" @change="changeCourseId">
          <option value="" default>All course</option>
          <option v-for="course in courses" :key="course.id" :value="course.id">{{ course.title }}</option>
        </select>
      </div>
      <div v-if="assessments.length === 0" class="mt-4 ml-6 italic">No quizes yet</div>
      <div v-else class="mt-6">
        <div class="grid grid-cols-12 gap-6">
          <div v-for="assessment in assessments" :key="assessment.id" :assessment="assessment" class="col-span-6">
            <QuizCard :slug="assessment.course_slug" :assessment="assessment" :fetchData="getAssessments" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { useRouter } from 'vue-router'

import { getAuthoredCourses } from '@/webServices/courseService'
import { getInstructorAssessments } from '@/webServices/assessmentService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import ButtonV7 from '@/components/Button/ButtonV7.vue'
import QuizCard from '@/components/Quiz/QuizCard/QuizCard.vue'

export default defineComponent({
  components: {
    LoadingV1,
    ButtonV7,
    QuizCard
  },
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()
    const router = useRouter()

    const courses = ref([])
    const assessments = ref([])
    const courseId = ref('')
    const loading = ref(false)

    const checkUserRole = async () => {
      if (!userStore.user?.roles.includes('instructor')) {
        router.push({ name: 'dashboard' })
        return false
      }
      return true
    }

    const changeCourseId = async e => {
      courseId.value = e.target.value
      await getAssessments()
    }

    const getCourses = async () => {
      const res = await getAuthoredCourses()

      if (res?.success) courses.value = res.courses.courses
    }

    const getAssessments = async () => {
      const res = await getInstructorAssessments({ course_id: courseId.value })

      if (res?.success) assessments.value = res.assessments

      console.log(res)
    }

    const fetchData = async () => {
      loading.value = true
      await Promise.all([getCourses(), getAssessments()])
      loading.value = false
    }

    onMounted(async () => {
      await checkUserRole()
      await fetchData()
    })

    return {
      userStore,
      homeStore,
      courses,
      assessments,
      courseId,
      loading,
      changeCourseId,
      getCourses,
      getAssessments
    }
  },
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 0 })
    }
  },
  created() {
    this.scrollToTop()
  }
})
</script>

<style scoped>
.select {
  font-size: 16px;
  border: 1px solid rgba(204, 204, 204, 1);
  @apply text-bodyColor bg-whiteColor;
}

.select:focus {
  @apply border-primaryColor outline-none;
}
</style>
