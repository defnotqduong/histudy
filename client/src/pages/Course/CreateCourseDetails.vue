<template>
  <div class="py-10">
    <div class="container mx-auto px-4">
      <div v-if="loading" class="min-h-[50vh] flex items-center justify-center text-primaryColor">
        <LoadingV1 />
      </div>

      <div v-else>
        <h2 class="text-2xl font-extrabold text-headingColor">Course Setup</h2>
        <p>Complete all fields ({{ completedFields }}/{{ totalFields }})</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
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
              <h3 class="text-xl font-bold text-headingColor">Customize your course</h3>
            </div>
            <TitleForm :course="course" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, watch, onMounted, computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { getCourse } from '@/webServices/courseService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import TitleForm from '@/components/Course/CreateCourse/TitleForm.vue'
export default defineComponent({
  components: { LoadingV1, TitleForm },
  setup() {
    const route = useRoute()
    const router = useRouter()
    const slug = ref(route.params.slug)
    const course = ref(null)
    const loading = ref(false)

    const fetchData = async slug => {
      loading.value = true
      const res = await getCourse(slug)
      console.log(res)
      if (!res.success) {
        router.push({ name: 'home' })
        return
      }

      course.value = res.data
      loading.value = false
    }

    watch(
      () => route.params.slug,
      newSlug => {
        slug.value = newSlug
        fetchData(newSlug)
      }
    )

    onMounted(() => {
      fetchData(slug.value)
    })

    const requiredFields = computed(() => [
      course.value?.title,
      course.value?.description,
      course.value?.thumb_url,
      course.value?.price,
      course.value?.category_id
    ])
    const totalFields = computed(() => requiredFields.value.length)
    const completedFields = computed(() => requiredFields.value.filter(Boolean).length)

    return {
      slug,
      course,
      loading,
      fetchData,
      requiredFields,
      totalFields,
      completedFields
    }
  }
})
</script>

<style></style>
