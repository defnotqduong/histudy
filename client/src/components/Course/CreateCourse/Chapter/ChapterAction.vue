<template>
  <div class="flex items-center gap-3">
    <button :disabled="!isComplete" class="px-4 py-2 text-headingColor bg-whiteColor border border-borderColor rounded-md">
      {{ chapter?.is_published ? 'Unpublist' : 'Publish' }}
    </button>
    <label :for="'my_modal_' + chapter?.id" class="py-2 px-3 text-whiteColor bg-blackColor rounded-md cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
        <path
          d="M8 1.5V2.5H3C2.44772 2.5 2 2.94772 2 3.5V4.5C2 5.05228 2.44772 5.5 3 5.5H21C21.5523 5.5 22 5.05228 22 4.5V3.5C22 2.94772 21.5523 2.5 21 2.5H16V1.5C16 0.947715 15.5523 0.5 15 0.5H9C8.44772 0.5 8 0.947715 8 1.5Z"
          fill="currentColor"
        />
        <path
          d="M3.9231 7.5H20.0767L19.1344 20.2216C19.0183 21.7882 17.7135 23 16.1426 23H7.85724C6.28636 23 4.98148 21.7882 4.86544 20.2216L3.9231 7.5Z"
          fill="currentColor"
        /></svg
    ></label>
    <input type="checkbox" :id="'my_modal_' + chapter?.id" class="modal-toggle" />
    <div class="modal" role="dialog">
      <div class="modal-box bg-white p-8 flex flex-col gap-8">
        <div class="flex flex-col items-start justify-start">
          <h5 class="text-lg font-extrabold text-headingColor mb-2">Are you sure?</h5>
          <p class="text-base text-headingColor">This action cannot be undone.</p>
        </div>
        <div class="flex items-center justify-end gap-3">
          <div class="modal-action">
            <label
              :for="'my_modal_' + chapter?.id"
              class="btn px-3 h-10 min-h-10 bg-whiteColor text-headingColor border border-borderColor hover:bg-whiteColor hover:border-borderColor"
              >Cancel</label
            >
          </div>
          <div class="modal-action">
            <button
              @click="deleteChapter()"
              :disabled="isSubmitting"
              :class="isSubmitting && 'opacity-70'"
              class="px-3 h-10 min-h-10 text-whiteColor bg-blackColor rounded-md"
            >
              Continue
            </button>
          </div>
        </div>
      </div>
      <label class="modal-backdrop" :for="'my_modal_' + chapter?.id">Close</label>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'
import { deleteCourseChapter } from '@/webServices/chapterService'

export default defineComponent({
  props: {
    chapter: Object,
    isComplete: Boolean,
    slug: String,
    id: String,
    fetchData: Function
  },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()
    const isSubmitting = ref(false)

    const deleteChapter = async () => {
      isSubmitting.value = true

      const res = await deleteCourseChapter(props.slug, props.id)

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something errors' })
        isSubmitting.value = false
        return
      }

      isSubmitting.value = false
      homeStore.onChangeToast({ show: true, type: 'success', message: 'Chapter deleted Successfully !' })
      router.push({ name: 'create-course-details', params: { slug: props.slug } })
    }

    return { isSubmitting, deleteChapter }
  }
})
</script>

<style></style>
