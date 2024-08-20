<template>
  <div class="mt-4 py-4 px-6 bg-lighterColor rounded-md">
    <div class="font-bold text-headingColor flex items-start justify-between">
      Course category
      <button @click.prevent="toggleEdit" class="flex items-center gap-2">
        <template v-if="isEditting"> Cancel </template>

        <template v-else>
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18" height="18" viewBox="0 0 24 24">
            <path
              d="M17.764,2A4.2,4.2,0,0,0,14.77,3.241L3.155,14.855a1,1,0,0,0-.28.55l-.863,5.438a1,1,0,0,0,1.145,1.145L8.6,21.125a1,1,0,0,0,.55-.28L20.759,9.23a4.236,4.236,0,0,0-3-7.23ZM7.96,19.2,4.2,19.8l.6-3.757,8.39-8.391,3.162,3.162ZM19.345,7.816,17.765,9.4,14.6,6.235l1.581-1.58a2.289,2.289,0,0,1,3.161,0,2.234,2.234,0,0,1,0,3.161Z"
            />
          </svg>
          Edit category
        </template>
      </button>
    </div>

    <div v-if="!isEditting" class="mt-2 text-headingColor">
      <span v-if="!category" class="italic text-bodyColor">No category</span>
      <span v-else>{{ category }}</span>
    </div>

    <form v-else @submit.prevent="onSubmit" class="space-y-4 mt-4 w-full">
      <select class="select w-full" v-model="selectedCategoryId" @change="changeCategory(selectedCategoryId)">
        <option v-for="category in categories" :key="category.id" :value="category.id">
          {{ category.name }}
        </option>
      </select>
      <div v-if="errors?.description && errors?.description.length > 0">
        <p v-for="(err, index) in errors?.description" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
      </div>

      <div class="mt-4 flex items-center gap-x-2">
        <button :disabled="isSubmitting" type="submit" class="px-4 py-2 text-whiteColor bg-blackColor rounded-md">Save</button>
      </div>
    </form>
  </div>
</template>

<script>
import { defineComponent, ref, watchEffect } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'
import { updateCourse } from '@/webServices/courseService'

export default defineComponent({
  props: {
    course: Object,
    slug: String,
    categories: Array,
    fetchData: Function
  },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()

    const isEditting = ref(false)
    const isSubmitting = ref(false)

    const errors = ref({})

    const category = ref(props.course?.category?.name)
    const selectedCategoryId = ref(null)
    const categories = ref([])

    const toggleEdit = () => {
      errors.value = {}
      isEditting.value = !isEditting.value
    }

    const changeCategory = id => {
      selectedCategoryId.value = id
    }

    const onSubmit = async () => {
      errors.value = {}
      isSubmitting.value = true

      const res = await updateCourse(props.slug, { category_id: selectedCategoryId.value })

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

    watchEffect(() => {
      categories.value = props.categories
      selectedCategoryId.value = props.course?.category_id || props.categories[0]?.id
    })

    return {
      isEditting,
      isSubmitting,
      errors,
      category,
      selectedCategoryId,
      categories,
      toggleEdit,
      changeCategory,
      onSubmit
    }
  }
})
</script>

<style scoped>
.select {
  font-size: 16px;
  border: 1.5px solid rgb(184, 182, 182);
  @apply text-bodyColor bg-whiteColor;
}

.select:focus {
  @apply border-primaryColor outline-none;
}
</style>
