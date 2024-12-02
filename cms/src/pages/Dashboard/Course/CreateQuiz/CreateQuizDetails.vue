<template>
  <div class="pt-10 pb-40">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>

    <div v-if="!loading">
      <router-link :to="{ name: 'course-quiz', params: { slug: slug } }"
        ><div
          class="inline-flex items-center gap-2 text-bodyColor relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor hover:after:left-0 hover:after:right-auto hover:after:w-full after:transition-all after:duration-300"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 52 52" enable-background="new 0 0 52 52">
            <path
              d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0  L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29  h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"
            />
          </svg>
          Back to quiz list
        </div></router-link
      >

      <div class="mt-4 flex items-center justify-between w-full">
        <div class="flex flex-col gap-y-1">
          <h2 class="text-2xl font-extrabold text-headingColor">Quiz Setup</h2>
        </div>
        <QuizAction :slug="slug" :id="id" />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { getAssessment } from '@/webServices/assessmentService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import QuizAction from '@/components/Quiz/CreateQuiz/QuizAction.vue'
export default defineComponent({
  components: { LoadingV1, QuizAction },
  setup() {
    const route = useRoute()
    const router = useRouter()

    const slug = ref(route.params.slug)
    const id = ref(route.params.id)
    const loading = ref(false)
    const assessment = ref(null)
    const questions = ref([])

    const fetchData = async () => {
      loading.value = true
      const res = await getAssessment(slug.value, id.value)
      console.log(res)

      if (!res.success) router.push({ name: 'course-quiz', params: { slug: slug.value } })

      if (res.success) {
        assessment.value = res.assessment
        questions.value = res.questions
      }

      loading.value = false
    }

    onMounted(async () => {
      await fetchData()
    })

    return {
      slug,
      id,
      loading,
      assessment,
      questions
    }
  }
})
</script>

<style></style>
