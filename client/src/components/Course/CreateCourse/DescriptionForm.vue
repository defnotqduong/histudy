<template>
  <div class="mt-4 py-4 px-6 bg-lighterColor rounded-md">
    <div class="font-bold text-headingColor flex items-start justify-between">
      Course description
      <button @click.prevent="toggleEdit" class="flex items-center gap-2">
        <template v-if="isEditting"> Cancel </template>

        <template v-else>
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18" height="18" viewBox="0 0 24 24">
            <path
              d="M17.764,2A4.2,4.2,0,0,0,14.77,3.241L3.155,14.855a1,1,0,0,0-.28.55l-.863,5.438a1,1,0,0,0,1.145,1.145L8.6,21.125a1,1,0,0,0,.55-.28L20.759,9.23a4.236,4.236,0,0,0-3-7.23ZM7.96,19.2,4.2,19.8l.6-3.757,8.39-8.391,3.162,3.162ZM19.345,7.816,17.765,9.4,14.6,6.235l1.581-1.58a2.289,2.289,0,0,1,3.161,0,2.234,2.234,0,0,1,0,3.161Z"
            />
          </svg>
          Edit description
        </template>
      </button>
    </div>

    <div v-if="!isEditting" class="mt-2 text-headingColor">
      <span v-if="!description" class="italic text-bodyColor">No description</span>
      <span v-else>{{ description }}</span>
    </div>
    <form v-else @submit.prevent="onSubmit" class="space-y-4 mt-4 w-full">
      <div class="input-group">
        <textarea class="textarea" v-model="description"></textarea>
        <div v-if="errors?.description && errors?.description.length > 0">
          <p v-for="(err, index) in errors?.description" :key="index" class="mt-2 text-red-500">{{ err }}</p>
        </div>
        <div class="mt-4 flex items-center gap-x-2">
          <button :disabled="isSubmitting" type="submit" class="px-4 py-2 text-whiteColor bg-blackColor rounded-md" :class="isSubmitting && 'opacity-70'">
            Save
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { defineComponent, ref, watch } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'
import { updateCourse } from '@/webServices/courseService'

export default defineComponent({
  props: {
    course: Object,
    slug: String,
    fetchData: Function
  },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()

    const description = ref(props.course?.description)
    const originalDescription = ref(props.course?.description)
    const isEditting = ref(false)
    const isSubmitting = ref(false)

    const errors = ref({})

    const toggleEdit = () => {
      description.value = originalDescription.value
      isEditting.value = !isEditting.value
    }

    const onSubmit = async () => {
      errors.value = {}
      isSubmitting.value = true

      const res = await updateCourse(props.slug, { description: description.value })

      console.log(res)
      if (!res.success) {
        errors.value = res.data.errors
        isSubmitting.value = false
        return
      }

      isSubmitting.value = false
      homeStore.onChangeToast({ show: true, type: 'success', message: 'Course updated Successfully !' })
      props.fetchData(res.course.slug)
      toggleEdit()
    }

    return { description, isEditting, isSubmitting, errors, toggleEdit, onSubmit }
  }
})
</script>

<style scoped>
.input-group input,
.input-group .textarea {
  width: 100%;
  border-radius: 0.375rem;
  border: 1px solid;
  font-size: 16px;
  outline: 0;
  padding: 0.5rem 1rem;
  @apply text-headingColor bg-whiteColor border-borderColor;
}

.input-group input:focus,
.input-group .textarea:focus {
  @apply border-primaryColor;
}
</style>
