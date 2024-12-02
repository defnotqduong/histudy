<template>
  <div>Create quiz details</div>
</template>

<script>
import { defineComponent, onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { getAssessment } from '@/webServices/assessmentService'
export default defineComponent({
  setup() {
    const route = useRoute()
    const router = useRouter()

    const slug = ref(route.params.slug)
    const id = ref(route.params.id)

    const fetchData = async () => {
      const res = await getAssessment(slug.value, id.value)

      console.log(res)

      if (!res.success) router.push({ name: 'quiz' })
    }

    onMounted(async () => {
      await fetchData()
    })
  }
})
</script>

<style></style>
