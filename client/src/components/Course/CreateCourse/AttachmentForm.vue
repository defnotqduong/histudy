<template>
  <div class="mt-4 py-4 px-6 bg-lighterColor rounded-md">
    <div class="font-bold text-headingColor flex items-start justify-between">
      Course attachments
      <button @click.prevent="toggleEdit" class="flex items-center gap-2">
        <template v-if="isEditting"> Cancel </template>

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
          Add a file
        </template>
      </button>
    </div>

    <template v-if="!isEditting">
      <p v-if="attachments.length === 0" class="mt-2 italic text-bodyColor">No attachments yet</p>
      <div v-else class="mt-6">
        <div v-for="attachment in attachments" :key="attachment.id" class="mb-2 px-4 py-3 bg-primaryOpacityColor rounded-md">
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
            <p class="text-sm line-clamp-1">
              {{ attachment.name }}
            </p>
            <button class="ml-auto px-2 flex items-center justify-center" @click.prevent="onDelete(attachment.id)">
              <span v-if="isSubmitting && deletingId === attachment.id" class="loading loading-spinner loading-sm"></span>
              <svg v-else xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                <g>
                  <path
                    d="M18 18L12 12M12 12L6 6M12 12L18 6M12 12L6 18"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </g>
              </svg>
            </button>
          </div>
        </div>
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
          <span class="text-sm">Only PDF files are allowed</span>

          <button
            v-if="file"
            type="submit"
            :disabled="isSubmitting"
            class="mt-4 px-6 py-[10px] min-w-20 flex items-center justify-center bg-primaryColor rounded-md text-whiteColor"
            :class="isSubmitting && 'opacity-70'"
          >
            <template v-if="isSubmitting"><span class="loading loading-spinner loading-sm"></span></template>
            <template v-else>Upload file</template>
          </button>
        </label>
      </form>
      <div v-if="errors?.attachment && errors?.attachment.length > 0">
        <p v-for="(err, index) in errors?.attachment" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
      </div>
      <div v-else class="text-sm text-muted-foreground mt-4">Add anything your students might need to complete the course.</div>
    </template>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useHomeStore } from '@/stores'
import { createCourseAttachment, deleteCourseAttachment } from '@/webServices/courseService'

export default defineComponent({
  props: {
    course: Object,
    slug: String,
    attachments: Array,
    fetchData: Function
  },

  setup(props) {
    const homeStore = useHomeStore()

    const attachments = ref(props.attachments)
    const deletingId = ref(null)

    const isEditting = ref(false)
    const isSubmitting = ref(false)
    const errors = ref({})

    const file = ref(null)

    const toggleEdit = () => {
      file.value = null
      errors.value = {}
      isEditting.value = !isEditting.value
    }

    const handleDrop = e => {
      if (e.dataTransfer.files.length > 0) {
        file.value = e.dataTransfer.files[0]
      }
    }

    const handleFileChange = e => {
      if (e.target.files.length > 0) {
        file.value = e.target.files[0]
      }
    }

    const onSubmit = async () => {
      errors.value = {}
      isSubmitting.value = true

      const formData = new FormData()
      if (file.value) {
        formData.append('attachment', file.value)
      }

      const res = await createCourseAttachment(props.slug, formData)

      if (!res.success) {
        errors.value = res.data.errors
        isSubmitting.value = false
        return
      }

      isSubmitting.value = false
      homeStore.onChangeToast({ show: true, type: 'success', message: 'Course updated Successfully !' })
      props.fetchData(props.slug)
      toggleEdit()
    }

    const onDelete = async id => {
      isSubmitting.value = true
      deletingId.value = id

      const res = await deleteCourseAttachment(props.slug, id)

      if (!res.success) {
        isSubmitting.value = false
        return
      }

      isSubmitting.value = false
      homeStore.onChangeToast({ show: true, type: 'success', message: 'Attachment deleted Successfully !' })
      props.fetchData(props.slug)
    }

    return {
      isEditting,
      isSubmitting,
      errors,
      attachments,
      deletingId,
      file,
      toggleEdit,
      handleDrop,
      handleFileChange,
      onSubmit,
      onDelete
    }
  }
})
</script>

<style></style>
