<template>
  <div class="py-10">
    <div class="container mx-auto px-4">
      <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
        <LoadingV1 />
      </div>

      <div v-if="!loading">
        <NotificationBanner v-if="!chapter?.is_published" :type="'warning'" :message="'This chapter is unpublished. It will not be visible in the course'" />

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
          <ChapterAction :slug="slug" :id="id" :chapter="chapter" :isComplete="isComplete" :fetchData="fetchData" />
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
            <div class="mt-8 flex items-center justify-start">
              <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z"
                    fill="currentColor"
                  />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-headingColor">Access Settings</h3>
            </div>
            <ChapterAccessForm :slug="slug" :id="id" :chapter="chapter" :fetchData="fetchData" />
          </div>
          <div>
            <div class="flex items-center justify-start">
              <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <g clip-path="url(#clip0_1348_126234)">
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M3 4C1.34315 4 0 5.34315 0 7V17C0 18.6569 1.34315 20 3 20H13C14.6569 20 16 18.6569 16 17V14.5307L20.7286 18.4249C22.0334 19.4994 24.0001 18.5713 24.0001 16.8811V7.28972C24.0001 5.54447 21.9211 4.63648 20.6408 5.8226L16 10.1222V7C16 5.34315 14.6569 4 13 4H3ZM2 7C2 6.44772 2.44772 6 3 6H13C13.5523 6 14 6.44772 14 7V17C14 17.5523 13.5523 18 13 18H3C2.44772 18 2 17.5523 2 17V7ZM16.5193 12.3675L22.0001 7.28972V16.8811L16.5193 12.3675Z"
                      fill="currentColor"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_1348_126234">
                      <rect width="24" height="24" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-headingColor">Add a video</h3>
            </div>
            <ChapterVideoForm :slug="slug" :id="id" :chapter="chapter" :muxData="muxData" :fetchData="fetchData" />
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
import ChapterAccessForm from '@/components/Course/CreateCourse/Chapter/ChapterAccessForm.vue'
import ChapterVideoForm from '@/components/Course/CreateCourse/Chapter/ChapterVideoForm.vue'
import NotificationBanner from '@/components/Toast/NotificationBanner.vue'
import ChapterAction from '@/components/Course/CreateCourse/Chapter/ChapterAction.vue'
export default defineComponent({
  components: { LoadingV1, ChapterTitleForm, ChapterDescriptionForm, ChapterAccessForm, ChapterVideoForm, NotificationBanner, ChapterAction },
  props: {},
  setup(props) {
    const router = useRouter()
    const route = useRoute()
    const homeStore = useHomeStore()

    const slug = ref(route.params.slug)
    const id = ref(route.params.id)
    const chapter = ref(null)
    const muxData = ref(null)
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
      muxData.value = res.chapter.mux_data
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
    const isComplete = computed(() => requiredFields.value.every(Boolean))

    return {
      slug,
      id,
      chapter,
      muxData,
      loading,
      totalFields,
      completedFields,
      isComplete,
      fetchData
    }
  }
})
</script>

<style></style>
