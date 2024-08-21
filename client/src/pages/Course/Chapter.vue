<template>
  <div class="py-20">
    <div class="container mx-auto px-4">
      <div v-if="loading" class="min-h-[50vh] flex items-center justify-center text-primaryColor">
        <LoadingV1 />
      </div>

      <div v-if="!loading">
        <h2 class="text-2xl font-extrabold text-headingColor">Chapter {{ chapter?.title }}</h2>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, watch, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { useHomeStore } from '@/stores'
import { getCourseChapter } from '@/webServices/courseService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
export default defineComponent({
  components: { LoadingV1 },
  props: {},
  setup(props) {
    const router = useRouter()
    const route = useRoute()
    const homeStore = useHomeStore()

    const slug = ref(route.params.slug)
    const id = ref(route.params.id)
    const chapter = ref(null)
    const loading = ref(false)

    const fetchData = async (slug, id) => {
      loading.value = true
      const res = await getCourseChapter(slug, id)
      console.log(res)
      if (!res.success) {
        router.push({ name: 'home' })
        return
      }

      chapter.value = res.chapter
      loading.value = false
    }

    watch(
      () => [route.params.slug, route.params.id],
      ([newSlug, newId]) => {
        slug.value = newSlug
        id.value = newId

        fetchData(newSlug, newId)
      }
    )

    onMounted(async () => {
      await Promise.all([fetchData(slug.value, id.value)])
    })

    return {
      slug,
      id,
      chapter,
      loading
    }
  }
})
</script>

<style></style>
