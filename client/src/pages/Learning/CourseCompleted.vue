<template>
  <div class="py-16">
    <div class="container mx-auto px-4">
      <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
        <span class="loading loading-spinner loading-md"></span>
      </div>
      <div v-else class="max-w-[860px] mx-auto">
        <div class="mb-4">
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
        </div>
        <div class="mb-12">
          <p class="text-headingColor" v-if="certTemplate || cert">
            Congratulations on successfully completing the
            <strong class="text-lg text-primaryColor font-bold">{{ course?.title }}</strong
            >! We are thrilled to present your certificate, a testament to your hard work and dedication throughout the course. Below is your well-deserved
            certificate after completing this milestone.
          </p>
          <p class="text-headingColor" v-else>
            Congratulations on successfully completing the
            <strong class="text-lg text-primaryColor font-bold">{{ course?.title }}</strong
            >! However, this course currently does not offer a certificate.
          </p>
        </div>
        <CertTemplateEl v-if="certTemplate" :cert="certTemplate" :slug="slug" :course="course" :fetchData="fetchData" />
        <CertEl v-if="cert" :cert="cert" :course="course" />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { getCertificate } from '@/webServices/learningService'

import CertTemplateEl from '@/components/Learning/CertTemplateEl.vue'
import CertEl from '@/components/Learning/CertEl.vue'
export default defineComponent({
  components: { CertTemplateEl, CertEl },
  setup() {
    const router = useRouter()
    const route = useRoute()

    const slug = ref(route.params.slug)
    const loading = ref(false)
    const course = ref(null)
    const cert = ref(null)
    const certTemplate = ref(null)

    const goBack = () => {
      router.push({ name: 'learning', params: { slug: slug.value } })
    }

    const fetchData = async () => {
      loading.value = true
      cert.value = null
      certTemplate.value = null

      const res = await getCertificate(slug.value)

      if (!res.success) router.push({ name: 'home' })

      if (res.success) {
        if (!res.is_exists) {
          certTemplate.value = res.cert
        } else {
          cert.value = res.cert
        }

        course.value = res.course
      }

      loading.value = false
    }

    onMounted(async () => {
      await fetchData()
    })

    return {
      course,
      cert,
      certTemplate,
      slug,
      loading,
      goBack,
      fetchData
    }
  }
})
</script>

<style></style>
