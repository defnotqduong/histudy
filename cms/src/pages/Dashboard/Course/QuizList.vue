<template>
  <div class="pt-10 pb-40">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>

    <div v-if="!loading">
      <div class="flex items-center justify-between">
        <router-link :to="{ name: 'create-course-details', params: { slug: slug } }"
          ><div
            class="inline-flex items-center gap-2 text-bodyColor relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor hover:after:left-0 hover:after:right-auto hover:after:w-full after:transition-all after:duration-300"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 52 52" enable-background="new 0 0 52 52">
              <path
                d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0  L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29  h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"
              />
            </svg>
            Back to course setup
          </div></router-link
        >

        <ButtonV7 :content="'Create'" :func="redirect" />
      </div>
      <div v-if="assessments.length === 0" class="mt-4 ml-6 italic">No quizes yet</div>
      <div v-else class="mt-6">
        <div class="grid grid-cols-12 gap-6">
          <div v-for="assessment in assessments" :key="assessment.id" :assessment="assessment" class="col-span-6">
            <QuizCard :slug="slug" :assessment="assessment" :fetchData="fetchData" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { getAssessmentsForCourse } from '@/webServices/assessmentService'

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
    const route = useRoute()
    const router = useRouter()

    const slug = ref(route.params.slug)
    const loading = ref(false)
    const assessments = ref([])

    const redirect = () => {
      router.push({ name: 'create-course-quiz', params: { slug: slug.value } })
    }

    const fetchData = async () => {
      loading.value = true
      const res = await getAssessmentsForCourse(slug.value)

      if (res.success) assessments.value = res.assessments

      loading.value = false
    }

    onMounted(async () => {
      await fetchData()
    })

    return {
      slug,
      loading,
      assessments,
      redirect,
      fetchData
    }
  }
})
</script>

<style></style>
