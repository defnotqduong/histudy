<template>
  <div class="flex items-center gap-3">
    <button
      :disabled="!isComplete || isSubmitting"
      @click.prevent="onChangeCourse()"
      class="px-4 h-10 min-h-10 text-sm text-whiteColor bg-blackColor rounded-md"
      :class="{ 'opacity-75': isSubmitting || !isComplete }"
    >
      {{ course?.is_published ? 'Unpublish' : 'Publish' }}
    </button>
    <label :for="'my_modal_' + course?.id" class="px-3 h-10 min-h-10 flex items-center justify-center text-whiteColor bg-blackColor rounded-md cursor-pointer">
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
    <input type="checkbox" :id="'my_modal_' + course?.id" class="modal-toggle" />
    <div class="modal" role="dialog">
      <div class="modal-box bg-white p-8 flex flex-col gap-8">
        <div class="flex flex-col items-start justify-start">
          <h5 class="text-lg font-extrabold text-headingColor mb-2">Are you sure?</h5>
          <p class="text-base text-headingColor">This action cannot be undone.</p>
        </div>
        <div class="flex items-center justify-end gap-3">
          <div class="modal-action">
            <label
              :for="'my_modal_' + course?.id"
              class="btn px-3 h-10 min-h-10 bg-whiteColor text-headingColor border border-borderColor hover:bg-whiteColor hover:border-borderColor"
              >Cancel</label
            >
          </div>
          <div class="modal-action">
            <button
              @click="onDeleteCourse()"
              :disabled="isSubmitting"
              :class="isSubmitting && 'opacity-75'"
              class="px-3 h-10 min-h-10 text-whiteColor bg-blackColor rounded-md"
            >
              Continue
            </button>
          </div>
        </div>
      </div>
      <label class="modal-backdrop" :for="'my_modal_' + course?.id">Close</label>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'
import { publishCourse, unpublishCourse, deleteCourse } from '@/webServices/courseService'

export default defineComponent({
  props: {
    course: Object,
    isComplete: Boolean,
    slug: String,
    fetchData: Function
  },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()
    const isSubmitting = ref(false)

    const onChangeCourse = async () => {
      isSubmitting.value = true

      if (!props.course?.is_published) {
        const res = await publishCourse(props.slug)

        if (!res.success) {
          homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
          isSubmitting.value = false
          return
        }

        if (res.success) {
          homeStore.onChangeToast({ show: true, type: 'success', message: 'Course published Successfully !' })
        }
      } else {
        const res = await unpublishCourse(props.slug)

        if (!res.success) {
          homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
          isSubmitting.value = false
          return
        }

        if (res.success) {
          homeStore.onChangeToast({ show: true, type: 'success', message: 'Course unpublished Successfully !' })
        }
      }

      props.fetchData(props.slug)
    }

    const onDeleteCourse = async () => {
      isSubmitting.value = true

      const res = await deleteCourse(props.slug)

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
        isSubmitting.value = false
        return
      }

      isSubmitting.value = false
      homeStore.onChangeToast({ show: true, type: 'success', message: 'Course deleted Successfully !' })
      router.push({ name: 'dashboard' })
    }

    return { isSubmitting, onChangeCourse, onDeleteCourse }
  }
})
</script>

<style></style>
