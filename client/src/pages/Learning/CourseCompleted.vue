<template>
  <div class="py-16">
    <div class="container mx-auto px-4">
      <button @click="goBack">
        <div
          class="inline-flex items-center gap-2 text-bodyColor relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor hover:after:left-0 hover:after:right-auto hover:after:w-full after:transition-all after:duration-300"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 52 52" enable-background="new 0 0 52 52">
            <path
              d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0  L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29  h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"
            />
          </svg>
          Back to learning page
        </div>
      </button>
      <CourseCompleted :cert="cert" />
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { getCertificate } from '@/webServices/learningService'

import CourseCompleted from '@/components/Learning/CourseCompleted.vue'
export default defineComponent({
  components: { CourseCompleted },
  setup() {
    const router = useRouter()
    const route = useRoute()

    const slug = ref(route.params.slug)
    const cert = ref(null)

    const goBack = () => {
      router.back()
    }

    const fetchData = async () => {
      const res = await getCertificate(slug.value)

      if (res.success) {
        cert.value = res.cert
      }
    }

    onMounted(async () => {
      await fetchData()
    })

    return {
      cert,
      goBack
    }
  }
})
</script>

<style></style>
