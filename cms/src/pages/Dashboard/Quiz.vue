<template>
  <div>Quiz</div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { useRouter } from 'vue-router'

import { getInstructorAssessments } from '@/webServices/assessmentService'

export default defineComponent({
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()
    const router = useRouter()

    const courseId = ref(2)

    const checkUserRole = async () => {
      if (!userStore.user?.roles.includes('instructor')) {
        router.push({ name: 'dashboard' })
        return false
      }
      return true
    }

    const fetchData = async () => {
      const res = await getInstructorAssessments({ course_id: courseId.value })

      console.log(res)
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
