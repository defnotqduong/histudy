<template>
  <div class="py-10">
    <div class="container mx-auto px-4">
      <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
        <LoadingV1 />
      </div>
      <div v-else>
        <NotificationBanner v-if="!lesson?.is_published" :type="'warning'" :message="'This lesson is unpublished. It will not be visible in the chapter.'" />

        <router-link :to="{ name: 'create-course-chapter', params: { slug: slug, chapterId: chapterId } }"
          ><div
            class="inline-flex items-center gap-2 text-bodyColor relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor hover:after:left-0 hover:after:right-auto hover:after:w-full after:transition-all after:duration-300"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 52 52" enable-background="new 0 0 52 52">
              <path
                d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0  L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29  h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"
              /></svg
            >Back to chapter setup
          </div></router-link
        >

        <div class="mt-4 flex items-center justify-between w-full">
          <div class="flex flex-col gap-y-1">
            <h1 class="text-2xl font-extrabold text-headingColor">Chapter Creation</h1>
            <span>Complete all fields ({{ completedFields }}/{{ totalFields }})</span>
          </div>
          <LessonAction :slug="slug" :chapterId="chapterId" :lessonId="lessonId" :lesson="lesson" :isComplete="isComplete" :fetchData="fetchData" />
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
              <h3 class="text-xl font-bold text-headingColor">Customize your lesson</h3>
            </div>
            <LessonTitleForm :slug="slug" :chapterId="chapterId" :lessonId="lessonId" :lesson="lesson" :fetchData="fetchData" />
            <LessonDescriptionForm :slug="slug" :chapterId="chapterId" :lessonId="lessonId" :lesson="lesson" :fetchData="fetchData" />
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
            <LessonAccessForm :slug="slug" :chapterId="chapterId" :lessonId="lessonId" :lesson="lesson" :fetchData="fetchData" />
          </div>
          <div>
            <div class="flex items-center justify-start">
              <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.07989 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-headingColor">Lesson video</h3>
            </div>
            <LessonVideoForm :slug="slug" :chapterId="chapterId" :lessonId="lessonId" :lesson="lesson" :fetchData="fetchData" />

            <div class="mt-8 flex items-center justify-start">
              <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M19 9V17.8C19 18.9201 19 19.4802 18.782 19.908C18.5903 20.2843 18.2843 20.5903 17.908 20.782C17.4802 21 16.9201 21 15.8 21H8.2C7.07989 21 6.51984 21 6.09202 20.782C5.71569 20.5903 5.40973 20.2843 5.21799 19.908C5 19.4802 5 18.9201 5 17.8V6.2C5 5.07989 5 4.51984 5.21799 4.09202C5.40973 3.71569 5.71569 3.40973 6.09202 3.21799C6.51984 3 7.0799 3 8.2 3H13M19 9L13 3M19 9H14C13.4477 9 13 8.55228 13 8V3"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-headingColor">Resources & Attachments</h3>
            </div>
            <LessonAttachmentForm :slug="slug" :chapterId="chapterId" :lessonId="lessonId" :lesson="lesson" :attachments="attachments" :fetchData="fetchData" />
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
import { getLesson } from '@/webServices/lessonService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import NotificationBanner from '@/components/Toast/NotificationBanner.vue'
import LessonAction from '@/components/Course/CreateCourse/Lesson/LessonAction.vue'
import LessonTitleForm from '@/components/Course/CreateCourse/Lesson/LessonTitleForm.vue'
import LessonDescriptionForm from '@/components/Course/CreateCourse/Lesson/LessonDescriptionForm.vue'
import LessonAccessForm from '@/components/Course/CreateCourse/Lesson/LessonAccessForm.vue'
import LessonVideoForm from '@/components/Course/CreateCourse/Lesson/LessonVideoForm.vue'
import LessonAttachmentForm from '@/components/Course/CreateCourse/Lesson/LessonAttachmentForm.vue'

export default defineComponent({
  components: { LoadingV1, NotificationBanner, LessonAction, LessonTitleForm, LessonDescriptionForm, LessonAccessForm, LessonVideoForm, LessonAttachmentForm },
  props: {},
  setup(props) {
    const router = useRouter()
    const route = useRoute()
    const homeStore = useHomeStore()

    const slug = ref(route.params.slug)
    const chapterId = ref(Number(route.params.chapterId))
    const lessonId = ref(Number(route.params.lessonId))
    const lesson = ref(null)
    const attachments = ref([])
    const loading = ref(false)

    const requiredFields = computed(() => [lesson.value?.title, lesson.value?.video_url])

    const totalFields = computed(() => requiredFields.value.length)
    const completedFields = computed(() => requiredFields.value.filter(Boolean).length)
    const isComplete = computed(() => requiredFields.value.every(Boolean))

    const fetchData = async (slug, chapterId, lessonId) => {
      loading.value = true
      const res = await getLesson(slug, chapterId, lessonId)
      console.log(res)
      if (!res.success) {
        router.push({ name: 'home' })
        return
      }

      lesson.value = res.lesson
      attachments.value = res.attachments
      loading.value = false
    }

    watch(
      () => [route.params.slug, route.params.chapterId, route.params.lessonId],
      ([newSlug, newChapterId, newLessonId]) => {
        slug.value = newSlug
        chapterId.value = Number(newChapterId)
        lessonId.value = Number(newLessonId)

        fetchData(newSlug, newChapterId, newLessonId)
      }
    )

    onMounted(async () => {
      await Promise.all([fetchData(slug.value, chapterId.value, lessonId.value)])
    })

    return {
      slug,
      chapterId,
      lessonId,
      lesson,
      attachments,
      loading,
      requiredFields,
      totalFields,
      completedFields,
      isComplete,
      fetchData
    }
  }
})
</script>

<style></style>
