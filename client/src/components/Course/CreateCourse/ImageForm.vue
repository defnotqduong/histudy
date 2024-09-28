<template>
  <div class="mt-4 py-4 px-6 bg-lighterColor rounded-md">
    <div class="font-bold text-headingColor flex items-start justify-between">
      Course Thumbnail
      <button @click.prevent="toggleEdit" class="flex items-center gap-2">
        <template v-if="isEditting"> Cancel </template>

        <template v-else-if="!isEditting && thumbnailUrl">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18" height="18" viewBox="0 0 24 24">
            <path
              d="M17.764,2A4.2,4.2,0,0,0,14.77,3.241L3.155,14.855a1,1,0,0,0-.28.55l-.863,5.438a1,1,0,0,0,1.145,1.145L8.6,21.125a1,1,0,0,0,.55-.28L20.759,9.23a4.236,4.236,0,0,0-3-7.23ZM7.96,19.2,4.2,19.8l.6-3.757,8.39-8.391,3.162,3.162ZM19.345,7.816,17.765,9.4,14.6,6.235l1.581-1.58a2.289,2.289,0,0,1,3.161,0,2.234,2.234,0,0,1,0,3.161Z"
            />
          </svg>
          Edit thumbnail
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
          Add thumbnail
        </template>
      </button>
    </div>

    <template v-if="!isEditting">
      <div v-if="!thumbnailUrl" class="mt-6 flex items-center justify-center h-72 bg-slate-200 rounded-md border-2 border-dashed border-[#575767]">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none">
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M23 4C23 2.34315 21.6569 1 20 1H4C2.34315 1 1 2.34315 1 4V20C1 21.6569 2.34315 23 4 23H20C21.6569 23 23 21.6569 23 20V4ZM21 4C21 3.44772 20.5523 3 20 3H4C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4Z"
            fill="currentColor"
          />
          <path
            d="M4.80665 17.5211L9.1221 9.60947C9.50112 8.91461 10.4989 8.91461 10.8779 9.60947L14.0465 15.4186L15.1318 13.5194C15.5157 12.8476 16.4843 12.8476 16.8682 13.5194L19.1451 17.5039C19.526 18.1705 19.0446 19 18.2768 19H5.68454C4.92548 19 4.44317 18.1875 4.80665 17.5211Z"
            fill="currentColor"
          />
          <path d="M18 8C18 9.10457 17.1046 10 16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8Z" fill="currentColor" />
        </svg>
      </div>
      <div v-else class="relative mt-6 h-72">
        <img :src="thumbnailUrl" class="w-full h-full object-cover object-center rounded-md" alt="Course thumbnail" />
      </div>
    </template>

    <template v-else>
      <form @drop.prevent="handleDrop" @dragover.prevent @submit.prevent="onSubmit" class="relative mt-6 flex items-center justify-center h-72">
        <input @change="handleFileChange" type="file" name="createInputFile" id="createInputFile" class="w-0 h-0" />
        <!-- <img v-if="imageUrl" :src="imageUrl" alt="Uploaded Image" class="absolute top-0 left-0 w-full h-full object-cover rounded-md z-[1]" /> -->
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
          <span class="text-sm">Image (4MB)</span>

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
      <div v-if="errors?.thumbnail && errors?.thumbnail.length > 0">
        <p v-for="(err, index) in errors?.thumbnail" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
      </div>
      <div v-else class="text-sm text-muted-foreground mt-4">16:9 aspect ratio recommended</div>
    </template>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useHomeStore } from '@/stores'
import { updateCourseThumbnail } from '@/webServices/courseService'

export default defineComponent({
  props: {
    course: Object,
    slug: String,
    fetchData: Function
  },

  setup(props) {
    const homeStore = useHomeStore()

    const thumbnailUrl = ref(props.course?.thumbnail_url)
    const file = ref(null)
    const imageUrl = ref(null)
    const uploadProgress = ref(0)
    const isEditting = ref(false)
    const isSubmitting = ref(false)
    const errors = ref({})

    const toggleEdit = () => {
      errors.value = {}
      file.value = null
      imageUrl.value = null
      uploadProgress.value = 0
      isEditting.value = !isEditting.value
    }

    const handleDrop = e => {
      if (e.dataTransfer.files.length > 0) {
        file.value = e.dataTransfer.files[0]
        imageUrl.value = URL.createObjectURL(file.value)
      }
    }

    const handleFileChange = e => {
      if (e.target.files.length > 0) {
        file.value = e.target.files[0]
        imageUrl.value = URL.createObjectURL(file.value)
      }
    }

    const onSubmit = async () => {
      errors.value = {}
      isSubmitting.value = true

      const formData = new FormData()
      if (file.value) {
        formData.append('image', file.value)
      }

      const res = await updateCourseThumbnail(props.slug, formData, progress => {
        uploadProgress.value = progress
      })

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
        errors.value = res.data.errors
        isSubmitting.value = false
        return
      }

      isSubmitting.value = false
      homeStore.onChangeToast({ show: true, type: 'success', message: 'Course updated Successfully !' })
      props.fetchData(props.slug)
      toggleEdit()
    }

    return {
      isEditting,
      isSubmitting,
      errors,
      thumbnailUrl,
      file,
      imageUrl,
      uploadProgress,
      toggleEdit,
      handleDrop,
      handleFileChange,
      onSubmit
    }
  }
})
</script>

<style></style>
