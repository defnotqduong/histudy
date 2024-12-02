<template>
  <div>Quiz</div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { useRouter } from 'vue-router'

import { getAuthoredCourses } from '@/webServices/courseService'
import { getInstructorAssessments } from '@/webServices/assessmentService'

export default defineComponent({
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()
    const router = useRouter()

    const courses = ref([])
    const assessments = ref([])
    const courseId = ref(null)

    const checkUserRole = async () => {
      if (!userStore.user?.roles.includes('instructor')) {
        router.push({ name: 'dashboard' })
        return false
      }
      return true
    }

    const getCourses = async () => {
      const res = await getAuthoredCourses()

      if (res?.success) courses.value = res.courses.courses
    }

    const getAssessments = async () => {
      const res = await getInstructorAssessments({ course_id: courseId.value })
    }

    const fetchData = async () => {
      await Promise.all([getCourses(), getAssessments()])
    }

    onMounted(async () => {
      const hasRole = await checkUserRole()

      await fetchData()
    })

    return {
      userStore,
      homeStore
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

<style></style>
