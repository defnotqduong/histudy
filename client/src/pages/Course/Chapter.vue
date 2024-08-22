<template>
  <div class="py-10">
    <div class="container mx-auto px-4">
      <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
        <LoadingV1 />
      </div>

      <div v-if="!loading">
        <router-link :to="{ name: 'create-course-details', params: { slug: slug } }"
          ><div
            class="inline-flex items-center gap-2 text-bodyColor relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor hover:after:left-0 hover:after:right-auto hover:after:w-full after:transition-all after:duration-300"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 52 52" enable-background="new 0 0 52 52">
              <path
                d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0  L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29  h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"
              /></svg
            >Back to course setup
          </div></router-link
        >
        <div class="mt-4 flex items-center justify-between w-full">
          <div class="flex flex-col gap-y-1">
            <h1 class="text-2xl font-extrabold text-headingColor">Chapter Creation</h1>
            <span>Complete all fields ({{ completedFields }}/{{ totalFields }})</span>
          </div>
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
              <h3 class="text-xl font-bold text-headingColor">Customize your chapter</h3>
            </div>
            <ChapterTitleForm :slug="slug" :id="id" :chapter="chapter" :fetchData="fetchData" />
            <ChapterDescriptionForm :slug="slug" :id="id" :chapter="chapter" :fetchData="fetchData" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, watch, onMounted, computed } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { useHomeStore } from '@/stores'
import { getCourseChapter } from '@/webServices/chapterService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import ChapterTitleForm from '@/components/Course/CreateCourse/Chapter/ChapterTitleForm.vue'
import ChapterDescriptionForm from '@/components/Course/CreateCourse/Chapter/ChapterDescriptionForm.vue'
export default defineComponent({
  components: { LoadingV1, ChapterTitleForm, ChapterDescriptionForm },
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

    const requiredFields = computed(() => [chapter.value?.title, chapter.value?.description, chapter.value?.video_url])

    const totalFields = computed(() => requiredFields.value.length)
    const completedFields = computed(() => requiredFields.value.filter(Boolean).length)

    return {
      slug,
      id,
      chapter,
      loading,
      totalFields,
      completedFields,
      fetchData
    }
  }
})
</script>

<style></style>
