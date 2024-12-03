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

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
        <div>
          <div class="flex items-center justify-start">
            <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <rect x="3" y="3" width="7" height="9" />
                <rect x="14" y="3" width="7" height="5" />
                <rect x="14" y="12" width="7" height="9" />
                <rect x="3" y="16" width="7" height="5" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-headingColor">Customize quiz</h3>
          </div>
          <TitleForm :slug="slug" :id="id" :assessment="assessment" :fetchData="fetchData" />
          <DescriptionForm :slug="slug" :id="id" :assessment="assessment" :fetchData="fetchData" />
          <div class="mt-8 flex items-center justify-start">
            <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M4 8C5.10457 8 6 7.10457 6 6C6 4.89543 5.10457 4 4 4C2.89543 4 2 4.89543 2 6C2 7.10457 2.89543 8 4 8Z" fill="currentColor" />
                <path d="M4 14C5.10457 14 6 13.1046 6 12C6 10.8954 5.10457 10 4 10C2.89543 10 2 10.8954 2 12C2 13.1046 2.89543 14 4 14Z" fill="currentColor" />
                <path d="M6 18C6 19.1046 5.10457 20 4 20C2.89543 20 2 19.1046 2 18C2 16.8954 2.89543 16 4 16C5.10457 16 6 16.8954 6 18Z" fill="currentColor" />
                <path
                  d="M21 7.5C21.5523 7.5 22 7.05228 22 6.5V5.5C22 4.94772 21.5523 4.5 21 4.5H9C8.44772 4.5 8 4.94772 8 5.5V6.5C8 7.05228 8.44772 7.5 9 7.5H21Z"
                  fill="currentColor"
                />
                <path
                  d="M22 12.5C22 13.0523 21.5523 13.5 21 13.5H9C8.44772 13.5 8 13.0523 8 12.5V11.5C8 10.9477 8.44772 10.5 9 10.5H21C21.5523 10.5 22 10.9477 22 11.5V12.5Z"
                  fill="currentColor"
                />
                <path
                  d="M21 19.5C21.5523 19.5 22 19.0523 22 18.5V17.5C22 16.9477 21.5523 16.5 21 16.5H9C8.44772 16.5 8 16.9477 8 17.5V18.5C8 19.0523 8.44772 19.5 9 19.5H21Z"
                  fill="currentColor"
                />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-headingColor">Questions</h3>
          </div>
          <QuestionForm :slug="slug" :id="id" :questions="questions" :fetchData="fetchData" :getQuestions="getQuestions" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { getAssessment, getQuestionsForAssessment } from '@/webServices/assessmentService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import QuizAction from '@/components/Quiz/CreateQuiz/QuizAction.vue'
import TitleForm from '@/components/Quiz/CreateQuiz/TitleForm.vue'
import DescriptionForm from '@/components/Quiz/CreateQuiz/DescriptionForm.vue'
import QuestionForm from '@/components/Quiz/CreateQuiz/QuestionForm.vue'

export default defineComponent({
  components: { LoadingV1, QuizAction, TitleForm, DescriptionForm, QuestionForm },
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

      if (!res.success) router.push({ name: 'course-quiz', params: { slug: slug.value } })

      if (res.success) {
        assessment.value = res.assessment
        questions.value = res.questions
      }

      loading.value = false
    }

    const getQuestions = async () => {
      const res = await getQuestionsForAssessment(slug.value, id.value)

      if (res.success) questions.value = res.questions
    }

    onMounted(async () => {
      await fetchData()
    })

    return {
      slug,
      id,
      loading,
      assessment,
      questions,
      fetchData,
      getQuestions
    }
  }
})
</script>

<style></style>
