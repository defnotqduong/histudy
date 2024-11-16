<template>
  <div class="mt-4 py-4 px-6 bg-lighterColor rounded-md">
    <div class="font-bold text-headingColor flex items-start justify-between">
      Chapters
      <button @click.prevent="toggleEdit" class="flex items-center gap-2">
        <template v-if="isEditting"> Cancel </template>

        <template v-else>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
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
          Add a chapter
        </template>
      </button>
    </div>

    <template v-if="!isEditting">
      <p v-if="chapters.length === 0" class="mt-2 italic text-bodyColor">No chapters</p>
      <ChapterList
        v-else
        :chapters="chapters"
        :onEditChapter="onEditChapter"
        :onReorderChapter="onReorderChapter"
        :onEditLesson="onEditLesson"
        :onReorderLesson="onReorderLesson"
      />
      <div class="text-sm text-muted-foreground mt-4">Drag and drop to render the chapters</div>
    </template>

    <template v-else>
      <form @submit.prevent="onSubmit" class="space-y-4 mt-4 w-full">
        <div class="input-group">
          <input type="text" v-model="title" placeholder="" />
          <div v-if="errors?.title && errors?.title.length > 0">
            <p v-for="(err, index) in errors?.title" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
          </div>
          <div class="mt-4 flex items-center gap-x-2">
            <button
              :disabled="isSubmitting"
              type="submit"
              class="px-4 py-2 text-whiteColor bg-blackColor rounded-md"
              :class="isSubmitting && 'opacity-75 cursor-no-drop'"
            >
              Save
            </button>
          </div>
        </div>
      </form>
    </template>
  </div>
</template>

<script>
import { defineComponent, ref, watch } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'
import { createChapter, reorderChapter } from '@/webServices/chapterService'
import { reorderLesson } from '@/webServices/lessonService'

import ChapterList from '@/components/Course/CreateCourse/ChapterList.vue'

export default defineComponent({
  components: { ChapterList },
  props: {
    course: Object,
    slug: String,
    chapters: Array,
    fetchData: Function
  },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()

    const chapters = ref(props.chapters)

    const title = ref('')
    const isEditting = ref(false)
    const isSubmitting = ref(false)
    const errors = ref({})

    const toggleEdit = () => {
      title.value = ''
      errors.value = {}
      isEditting.value = !isEditting.value
    }

    const onSubmit = async () => {
      errors.value = {}
      isSubmitting.value = true

      if (!title.value.trim()) {
        errors.value.title = errors.value.title || []
        errors.value.title.push('Please enter a chapter title')
        isSubmitting.value = false
        return
      }

      const res = await createChapter(props.slug, { title: title.value })

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
        errors.value = res.data.errors
        isSubmitting.value = false
        return
      }

      isSubmitting.value = false
      homeStore.onChangeToast({ show: true, type: 'success', message: 'Chapter created Successfully !' })
      props.fetchData(props.slug)
      toggleEdit()
    }

    const onEditChapter = async id => {
      router.push({ name: 'create-course-chapter', params: { slug: props.slug, chapterId: id } })
    }

    const onReorderChapter = async bulkUpdateData => {
      const res = await reorderChapter(props.slug, { items: bulkUpdateData })

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Wrong something !' })
        return
      }

      homeStore.onChangeToast({ show: true, type: 'success', message: 'Chapter reorder Successfully !' })
    }

    const onEditLesson = (chapterId, lessonId) => {
      router.push({ name: 'create-course-lesson', params: { slug: props.slug, chapterId: chapterId, lessonId: lessonId } })
    }

    const onReorderLesson = async (chapterId, bulkUpdateData) => {
      const res = await reorderLesson(props.slug, chapterId, { items: bulkUpdateData })

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Wrong something !' })
        return
      }

      homeStore.onChangeToast({ show: true, type: 'success', message: 'Lesson reorder Successfully !' })
    }

    return { chapters, title, isEditting, isSubmitting, errors, toggleEdit, onSubmit, onEditChapter, onReorderChapter, onEditLesson, onReorderLesson }
  }
})
</script>

<style scoped>
.input-group input,
.input-group .textarea {
  width: 100%;
  border-radius: 0.375rem;
  border: 1.5px solid;
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
