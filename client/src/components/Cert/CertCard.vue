<template>
  <div class="cert-card">
    <img :src="cert?.cert_url" alt="certificate" />

    <ButtonV7 :content="'View more'" :func="redirect" class="w-full mt-5" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useRouter } from 'vue-router'

import ButtonV7 from '@/components/Button/ButtonV7.vue'
export default defineComponent({
  components: { ButtonV7 },
  props: {
    cert: Object
  },
  setup(props) {
    const router = useRouter()

    const redirect = () => {
      router.push({ name: 'course-completed', params: { slug: props.cert.course_slug } })
    }

    return { redirect }
  }
})
</script>

<style scoped>
.cert-card {
  box-shadow: 0px 6px 34px rgba(215, 216, 222, 0.4);
  @apply bg-whiteColor p-5 rounded-lg;
}
</style>
