<template>
  <div class="pt-10 pb-40">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>

    <div v-if="!loading">
      <div v-for="(course, index) in courses" :key="index">{{ course.title }}</div>
    </div>
  </div>
</template>

<script>
import { defineComponent, onMounted, ref } from 'vue'
import { useHomeStore } from '@/stores'
import { getAuthoredCourses } from '@/webServices/courseService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'

export default defineComponent({
  components: { LoadingV1 },
  setup() {
    const homeStore = useHomeStore()

    const courses = ref([])
    const loading = ref(false)

    const fetchData = async () => {
      loading.value = true

      const res = await getAuthoredCourses()

      if (res.success) courses.value = res.courses.courses

      loading.value = false
    }

    onMounted(() => {
      fetchData()
    })

    return {
      homeStore,
      courses,
      loading
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
