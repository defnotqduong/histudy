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
          <LearningSideBar :course="course" :chapters="chapters" />
          <div class="h-full flex-1">
            <LearningContent />
          </div>
        </div>
      </div>
      <div class="fixed bottom-0 left-0 right-0 z-20">
        <LearningFooter />
      </div>
    </template>
  </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useUserStore, useHomeStore } from '@/stores'
import { getLearningInfo } from '@/webServices/learningService'

import LearningHeader from '@/components/Learning/LearningHeader.vue'
import LearningContent from '@/components/Learning/LearningContent.vue'
import LearningSideBar from '@/components/Learning/LearningSideBar.vue'
import LearningFooter from '@/components/Learning/LearningFooter.vue'

export default defineComponent({
  components: { LearningHeader, LearningSideBar, LearningContent, LearningFooter },
  setup() {
    const userStore = useUserStore()
    const homeStore = useHomeStore()
    const route = useRoute()
    const router = useRouter()

    const slug = ref(route.params.slug)
    const course = ref(null)
    const chapters = ref([])
    const loading = ref(false)

    const fetchData = async () => {
      loading.value = true

      const res = await getLearningInfo(slug.value)

      console.log(res)

      if (!res.success) {
        router.push({ name: 'home' })
        return
      }

      course.value = res.course
      chapters.value = res.chapters
      loading.value = false
    }

    onMounted(async () => {
      await fetchData()
    })

    return {
      course,
      chapters,
      loading
    }
  }
})
</script>

<style></style>
