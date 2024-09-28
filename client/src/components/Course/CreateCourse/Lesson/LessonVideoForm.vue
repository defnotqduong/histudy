<template>
  <div class="mt-4 py-4 px-6 bg-lighterColor rounded-md">
    <div class="font-bold text-headingColor flex items-start justify-between">
      Lesson video
      <button @click.prevent="toggleEdit" class="flex items-center gap-2">
        <template v-if="isEditting"> Cancel </template>

        <template v-else-if="!isEditting && lesson?.video_url">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18" height="18" viewBox="0 0 24 24">
            <path
              d="M17.764,2A4.2,4.2,0,0,0,14.77,3.241L3.155,14.855a1,1,0,0,0-.28.55l-.863,5.438a1,1,0,0,0,1.145,1.145L8.6,21.125a1,1,0,0,0,.55-.28L20.759,9.23a4.236,4.236,0,0,0-3-7.23ZM7.96,19.2,4.2,19.8l.6-3.757,8.39-8.391,3.162,3.162ZM19.345,7.816,17.765,9.4,14.6,6.235l1.581-1.58a2.289,2.289,0,0,1,3.161,0,2.234,2.234,0,0,1,0,3.161Z"
            />
          </svg>
          Edit video
        </template>

        <template v-else
          ><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
            <path
              d="M11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8V11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H13V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V13H8C7.44771 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11H11V8Z"
              fill="currentColor"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z"
              fill="currentColor"
            />
          </svg>
          Add video
        </template>
      </button>
    </div>

    <template v-if="!isEditting">
      <div v-if="!lesson?.video_url" class="mt-6 flex items-center justify-center h-72 bg-slate-200 rounded-md border-2 border-dashed border-[#575767]">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none">
          <rect width="24" height="24" fill="none" />
          <path
            d="M5 18H15C16.1046 18 17 17.1046 17 16V8.57143V8C17 6.89543 16.1046 6 15 6H5C3.89543 6 3 6.89543 3 8V16C3 17.1046 3.89543 18 5 18Z"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <circle cx="6.5" cy="9.5" r="0.5" stroke="currentColor" stroke-linejoin="round" />
          <path d="M17 10L21 7V17L17 14" stroke="currentColor" stroke-linejoin="round" />
        </svg>
      </div>
      <div v-else class="relative mt-6">
        <div class="h-80">
          <iframe
            :src="lesson.video_url"
            frameborder="0"
            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            class="w-full h-full rounded-md"
          ></iframe>
        </div>
        <div class="text-sm mt-3">Videos can take a few minutes to process. Refresh the page if video does not appear.</div>
      </div>
    </template>

    <template v-else>
      <form @drop.prevent="handleDrop" @dragover.prevent @submit.prevent="onSubmit" class="relative mt-6 flex items-center justify-center h-72">
        <input @change="handleFileChange" type="file" name="createInputFile" id="createInputFile" class="w-0 h-0" />
        <label
          for="createInputFile"
          class="w-full h-full flex flex-col items-center justify-center bg-slate-200 rounded-md border-2 border-dashed border-[#575767]"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="48" height="48" viewBox="0 -1.5 35 35" version="1.1">
            <path
              d="M29.426 15.535c0 0 0.649-8.743-7.361-9.74-6.865-0.701-8.955 5.679-8.955 5.679s-2.067-1.988-4.872-0.364c-2.511 1.55-2.067 4.388-2.067 4.388s-5.576 1.084-5.576 6.768c0.124 5.677 6.054 5.734 6.054 5.734h9.351v-6h-3l5-5 5 5h-3v6h8.467c0 0 5.52 0.006 6.295-5.395 0.369-5.906-5.336-7.070-5.336-7.070z"
            />
          </svg>
          <div class="mt-2 font-bold text-primaryColor">Choose files or drag and drop</div>
          <span class="text-sm">Video (1GB)</span>

          <button
            v-if="file"
            type="submit"
            :disabled="isSubmitting"
            class="relative mt-4 px-6 py-[10px] min-w-20 flex items-center justify-center bg-primaryColor rounded-md text-whiteColor overflow-hidden"
            :class="isSubmitting && 'opacity-75 cursor-no-drop'"
          >
            <div class="absolute top-0 left-0 h-full bg-[#0000004d]" :style="{ width: `${uploadProgress}%` }"></div>
            <template v-if="isSubmitting"><span class="loading loading-spinner loading-sm"></span></template>
            <template v-else>Upload file</template>
          </button>
        </label>
      </form>
      <div v-if="errors?.video && errors?.video.length > 0">
        <p v-for="(err, index) in errors?.video" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
      </div>
      <div v-else class="text-sm mt-4">Upload this lesson's video</div>
    </template>
  </div>
</template>

<script>
import { defineComponent, ref, watch } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'
import { uploadLessonVideo } from '@/webServices/lessonService'
import { loadVideo } from '@/utils'

export default defineComponent({
  props: {
    lesson: Object,
    slug: String,
    chapterId: Number,
    lessonId: Number,
    fetchData: Function
  },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()

    const file = ref(null)
    const isEditting = ref(false)
    const isSubmitting = ref(false)
    const uploadProgress = ref(0)
    const errors = ref({})

    const toggleEdit = () => {
      errors.value = {}
      file.value = null
      uploadProgress.value = 0
      isEditting.value = !isEditting.value
    }

    const handleDrop = e => {
      if (e.dataTransfer.files.length > 0) {
        file.value = e.dataTransfer.files[0]
        console.log(file.value)
      }
    }

    const handleFileChange = e => {
      if (e.target.files.length > 0) {
        file.value = e.target.files[0]
        console.log(file.value)
      }
    }

    const validateFile = file => {
      const validVideoTypes = ['video/mp4']
      return file && validVideoTypes.includes(file.type)
    }

    const onSubmit = async () => {
      errors.value = {}
      uploadProgress.value = 0
      isSubmitting.value = true

      const formData = new FormData()
      if (validateFile(file.value)) {
        const video = await loadVideo(file.value)
        const duration = Math.round(video.duration)
        formData.append('video', file.value)
        formData.append('duration', duration)
      }

      const res = await uploadLessonVideo(props.slug, props.chapterId, props.lessonId, formData, progress => {
        uploadProgress.value = progress
      })

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
        errors.value = res.data.errors
        isSubmitting.value = false
        return
      }

      isSubmitting.value = false
      homeStore.onChangeToast({ show: true, type: 'success', message: 'Video uploaded Successfully !' })
      props.fetchData(props.slug, props.chapterId, props.lessonId)
      toggleEdit()
    }

    return { file, isEditting, isSubmitting, errors, uploadProgress, toggleEdit, handleDrop, handleFileChange, onSubmit }
  }
})
</script>

<style scoped>
.input-group input {
  width: 100%;
  border-radius: 0.375rem;
  border: 1.5px solid;
  outline: 0;
  padding: 0.5rem 1rem;
  @apply text-headingColor bg-whiteColor border-borderColor;
}

.input-group input:focus {
  @apply border-primaryColor;
}
</style>
