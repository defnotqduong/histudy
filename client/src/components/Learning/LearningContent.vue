<template>
  <div class="h-full w-full pb-40 px-4 pt-4 relative overflow-auto custom-scrollbar">
    <h4 class="mb-2 flex items-center justify-start gap-2 text-xl text-headingColor font-extrabold">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
        <path
          d="M4.91602 1.33366V1.16699H17.5827V16.3337H17.416V3.33366C17.416 2.80322 17.2053 2.29452 16.8302 1.91945C16.4552 1.54437 15.9465 1.33366 15.416 1.33366H4.91602Z"
          stroke="currentColor"
          stroke-width="1.5"
        />
        <path
          d="M15.416 2.91699H2.08268C1.97218 2.91699 1.86619 2.96089 1.78805 3.03903C1.70991 3.11717 1.66602 3.22315 1.66602 3.33366V19.167C1.66602 19.2775 1.70991 19.3835 1.78805 19.4616C1.86619 19.5398 1.97218 19.5837 2.08268 19.5837H15.416C15.5265 19.5837 15.6325 19.5398 15.7106 19.4616C15.7888 19.3835 15.8327 19.2775 15.8327 19.167V3.33366C15.8327 3.22315 15.7888 3.11717 15.7106 3.03903C15.6325 2.96089 15.5265 2.91699 15.416 2.91699ZM8.74935 14.5837H4.99935C4.88884 14.5837 4.78286 14.5398 4.70472 14.4616C4.62658 14.3835 4.58268 14.2775 4.58268 14.167C4.58268 14.0565 4.62658 13.9505 4.70472 13.8724C4.78286 13.7942 4.88884 13.7503 4.99935 13.7503H8.74935C8.85986 13.7503 8.96584 13.7942 9.04398 13.8724C9.12212 13.9505 9.16602 14.0565 9.16602 14.167C9.16602 14.2775 9.12212 14.3835 9.04398 14.4616C8.96584 14.5398 8.85986 14.5837 8.74935 14.5837ZM12.4993 11.2503H4.99935C4.88884 11.2503 4.78286 11.2064 4.70472 11.1283C4.62658 11.0501 4.58268 10.9442 4.58268 10.8337C4.58268 10.7232 4.62658 10.6172 4.70472 10.539C4.78286 10.4609 4.88884 10.417 4.99935 10.417H12.4993C12.6099 10.417 12.7158 10.4609 12.794 10.539C12.8721 10.6172 12.916 10.7232 12.916 10.8337C12.916 10.9442 12.8721 11.0501 12.794 11.1283C12.7158 11.2064 12.6099 11.2503 12.4993 11.2503ZM12.4993 7.91699H4.99935C4.88884 7.91699 4.78286 7.87309 4.70472 7.79495C4.62658 7.71681 4.58268 7.61083 4.58268 7.50033C4.58268 7.38982 4.62658 7.28384 4.70472 7.2057C4.78286 7.12756 4.88884 7.08366 4.99935 7.08366H12.4993C12.6099 7.08366 12.7158 7.12756 12.794 7.2057C12.8721 7.28384 12.916 7.38982 12.916 7.50033C12.916 7.61083 12.8721 7.71681 12.794 7.79495C12.7158 7.87309 12.6099 7.91699 12.4993 7.91699Z"
          fill="currentColor"
        />
      </svg>
      {{ lesson?.info?.title }}
    </h4>
    <div>
      <VideoPlayer :url="lesson?.info?.video_url" :func="updateLesson" class="w-full h-[500px]" />
    </div>
    <div v-if="lesson?.info?.description" class="pt-10 px-12 mx-auto">
      <h4 class="mb-5 text-2xl font-extrabold text-headingColor">About Lesson</h4>
      <p v-html="lesson?.info?.description" class="prose"></p>
    </div>
    <div v-if="lesson?.attachments.length > 0" class="pt-10 px-12 mx-auto">
      <h4 class="mb-5 text-2xl font-extrabold text-headingColor">Attachments</h4>
      <div v-for="attachment in lesson?.attachments" :key="attachment.id" class="max-w-[500px] mb-2 px-4 py-3 bg-primaryOpacityColor rounded-md">
        <div class="flex items-center justify-start gap-2 text-primaryColor">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
            <path
              d="M19 9V17.8C19 18.9201 19 19.4802 18.782 19.908C18.5903 20.2843 18.2843 20.5903 17.908 20.782C17.4802 21 16.9201 21 15.8 21H8.2C7.07989 21 6.51984 21 6.09202 20.782C5.71569 20.5903 5.40973 20.2843 5.21799 19.908C5 19.4802 5 18.9201 5 17.8V6.2C5 5.07989 5 4.51984 5.21799 4.09202C5.40973 3.71569 5.71569 3.40973 6.09202 3.21799C6.51984 3 7.0799 3 8.2 3H13M19 9L13 3M19 9H14C13.4477 9 13 8.55228 13 8V3"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <p class="text-sm line-clamp-1">{{ attachment.name }}</p>
          <!-- <button @click.prevent="downloadAttachment(attachment.attachment_url)" class="ml-auto px-2 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
              <path
                d="M12.5535 16.5061C12.4114 16.6615 12.2106 16.75 12 16.75C11.7894 16.75 11.5886 16.6615 11.4465 16.5061L7.44648 12.1311C7.16698 11.8254 7.18822 11.351 7.49392 11.0715C7.79963 10.792 8.27402 10.8132 8.55352 11.1189L11.25 14.0682V3C11.25 2.58579 11.5858 2.25 12 2.25C12.4142 2.25 12.75 2.58579 12.75 3V14.0682L15.4465 11.1189C15.726 10.8132 16.2004 10.792 16.5061 11.0715C16.8118 11.351 16.833 11.8254 16.5535 12.1311L12.5535 16.5061Z"
                fill="currentColor"
              />
              <path
                d="M3.75 15C3.75 14.5858 3.41422 14.25 3 14.25C2.58579 14.25 2.25 14.5858 2.25 15V15.0549C2.24998 16.4225 2.24996 17.5248 2.36652 18.3918C2.48754 19.2919 2.74643 20.0497 3.34835 20.6516C3.95027 21.2536 4.70814 21.5125 5.60825 21.6335C6.47522 21.75 7.57754 21.75 8.94513 21.75H15.0549C16.4225 21.75 17.5248 21.75 18.3918 21.6335C19.2919 21.5125 20.0497 21.2536 20.6517 20.6516C21.2536 20.0497 21.5125 19.2919 21.6335 18.3918C21.75 17.5248 21.75 16.4225 21.75 15.0549V15C21.75 14.5858 21.4142 14.25 21 14.25C20.5858 14.25 20.25 14.5858 20.25 15C20.25 16.4354 20.2484 17.4365 20.1469 18.1919C20.0482 18.9257 19.8678 19.3142 19.591 19.591C19.3142 19.8678 18.9257 20.0482 18.1919 20.1469C17.4365 20.2484 16.4354 20.25 15 20.25H9C7.56459 20.25 6.56347 20.2484 5.80812 20.1469C5.07435 20.0482 4.68577 19.8678 4.40901 19.591C4.13225 19.3142 3.9518 18.9257 3.85315 18.1919C3.75159 17.4365 3.75 16.4354 3.75 15Z"
                fill="currentColor"
              />
            </svg>
          </button> -->
          <a :href="attachment.attachment_url" download class="ml-auto px-2 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
              <path
                d="M12.5535 16.5061C12.4114 16.6615 12.2106 16.75 12 16.75C11.7894 16.75 11.5886 16.6615 11.4465 16.5061L7.44648 12.1311C7.16698 11.8254 7.18822 11.351 7.49392 11.0715C7.79963 10.792 8.27402 10.8132 8.55352 11.1189L11.25 14.0682V3C11.25 2.58579 11.5858 2.25 12 2.25C12.4142 2.25 12.75 2.58579 12.75 3V14.0682L15.4465 11.1189C15.726 10.8132 16.2004 10.792 16.5061 11.0715C16.8118 11.351 16.833 11.8254 16.5535 12.1311L12.5535 16.5061Z"
                fill="currentColor"
              />
              <path
                d="M3.75 15C3.75 14.5858 3.41422 14.25 3 14.25C2.58579 14.25 2.25 14.5858 2.25 15V15.0549C2.24998 16.4225 2.24996 17.5248 2.36652 18.3918C2.48754 19.2919 2.74643 20.0497 3.34835 20.6516C3.95027 21.2536 4.70814 21.5125 5.60825 21.6335C6.47522 21.75 7.57754 21.75 8.94513 21.75H15.0549C16.4225 21.75 17.5248 21.75 18.3918 21.6335C19.2919 21.5125 20.0497 21.2536 20.6517 20.6516C21.2536 20.0497 21.5125 19.2919 21.6335 18.3918C21.75 17.5248 21.75 16.4225 21.75 15.0549V15C21.75 14.5858 21.4142 14.25 21 14.25C20.5858 14.25 20.25 14.5858 20.25 15C20.25 16.4354 20.2484 17.4365 20.1469 18.1919C20.0482 18.9257 19.8678 19.3142 19.591 19.591C19.3142 19.8678 18.9257 20.0482 18.1919 20.1469C17.4365 20.2484 16.4354 20.25 15 20.25H9C7.56459 20.25 6.56347 20.2484 5.80812 20.1469C5.07435 20.0482 4.68577 19.8678 4.40901 19.591C4.13225 19.3142 3.9518 18.9257 3.85315 18.1919C3.75159 17.4365 3.75 16.4354 3.75 15Z"
                fill="currentColor"
              />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import JsFileDownloader from 'js-file-downloader'
import { useHomeStore } from '@/stores'
import { updateCompletedLesson } from '@/webServices/learningService'

import VideoPlayer from '@/components/VideoComponents/VideoPlayer.vue'

export default defineComponent({
  components: { VideoPlayer },
  props: {
    lesson: Object,
    updateStatusLesson: Function
  },
  setup(props) {
    const homeStore = useHomeStore()

    const downloadAttachment = async url => {
      console.log(url)
      new JsFileDownloader({
        url: url
      })
        .then(function () {})
        .catch(function (error) {
          console.log(error)
        })
    }

    const updateLesson = async () => {
      if (props.lesson?.info?.is_completed) return

      const res = await updateCompletedLesson({ lesson_id: props.lesson?.info?.id })

      if (res.success) props.updateStatusLesson()
    }

    return { downloadAttachment, updateLesson }
  }
})
</script>

<style></style>
