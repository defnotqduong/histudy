<template>
  <div class="h-full w-80 relative border-l border-borderColor overflow-auto custom-scrollbar">
    <div class="px-4 py-4 border-b border-borderColor">
      <div class="flex items-center justify-between text-headingColor font-bold">
        <span>Notes</span>
        <button @click="toggleLessonNoteModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
            <g>
              <path
                d="M15 4L15 20M15 4H7.2002C6.08009 4 5.51962 4 5.0918 4.21799C4.71547 4.40973 4.40973 4.71547 4.21799 5.0918C4 5.51962 4 6.08009 4 7.2002V16.8002C4 17.9203 4 18.4796 4.21799 18.9074C4.40973 19.2837 4.71547 19.5905 5.0918 19.7822C5.51921 20 6.07901 20 7.19694 20L15 20M15 4H16.8002C17.9203 4 18.4796 4 18.9074 4.21799C19.2837 4.40973 19.5905 4.71547 19.7822 5.0918C20 5.5192 20 6.079 20 7.19691L20 16.8031C20 17.921 20 18.48 19.7822 18.9074C19.5905 19.2837 19.2837 19.5905 18.9074 19.7822C18.48 20 17.921 20 16.8031 20H15"
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
    <div class="px-4 pt-4 pb-8">
      <form @submit.prevent="createNote">
        <textarea
          v-model="content"
          class="w-full min-h-28 p-2 text-headingColor border border-borderColor outline-none rounded-md resize-none focus:border-headingColor"
          placeholder="Enter content..."
        ></textarea>
        <div v-if="errors?.content && errors?.content.length > 0">
          <p v-for="(err, index) in errors?.content" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
        </div>
        <div class="mt-2 flex justify-end">
          <button
            type="submit"
            :disabled="submit"
            :class="{ 'cursor-not-allowed': submit }"
            class="px-4 py-1 text-whiteColor bg-thirtyColor rounded-md transition-all duration-200 hover:opacity-90"
          >
            Save
          </button>
        </div>
      </form>
      <div class="mt-6">
        <ul>
          <li v-for="(note, index) in notes" :key="index" class="p-3 mb-4 border border-borderColor rounded-md">
            <div class="flex items-center justify-between">
              <span class="text-sm text-bodyColor">{{ formatTimeLong(note?.created_at) }}</span>
              <button @click="deleteNote(note?.id)" :class="{ 'cursor-not-allowed': noteId === note?.id }" class="text-dangerColor">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M8 1.5V2.5H3C2.44772 2.5 2 2.94772 2 3.5V4.5C2 5.05228 2.44772 5.5 3 5.5H21C21.5523 5.5 22 5.05228 22 4.5V3.5C22 2.94772 21.5523 2.5 21 2.5H16V1.5C16 0.947715 15.5523 0.5 15 0.5H9C8.44772 0.5 8 0.947715 8 1.5Z"
                    fill="currentColor"
                  />
                  <path
                    d="M3.9231 7.5H20.0767L19.1344 20.2216C19.0183 21.7882 17.7135 23 16.1426 23H7.85724C6.28636 23 4.98148 21.7882 4.86544 20.2216L3.9231 7.5Z"
                    fill="currentColor"
                  />
                </svg>
              </button>
            </div>
            <div class="mt-4">
              <p class="text-base text-headingColor">
                {{ note?.content }}
              </p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { formatTimeLong, formatTimeShort } from '@/utils'
import { createNoteLesson, deleteNoteLesson } from '@/webServices/learningService'
export default defineComponent({
  props: {
    currentLesson: Object,
    notes: Array,
    updateNotes: Function,
    isShowLessonNoteModal: Boolean,
    toggleLessonNoteModal: Function
  },
  setup(props) {
    const userStore = useUserStore()
    const homeStore = useHomeStore()

    const content = ref('')
    const submit = ref(false)
    const loading = ref(false)
    const errors = ref({})
    const noteId = ref(null)

    const createNote = async () => {
      submit.value = true
      errors.value = {}

      const res = await createNoteLesson(props.currentLesson?.id, {
        content: content.value
      })

      if (!res.success) {
        errors.value = res.data.errors
      }

      if (res.success) {
        content.value = ''
        props.updateNotes(res.notes)
      }

      submit.value = false
    }

    const deleteNote = async id => {
      loading.value = true
      noteId.value = id

      const res = await deleteNoteLesson(props.currentLesson?.id, noteId.value)

      if (res.success) {
        noteId.value = null
        props.updateNotes(res.notes)
      }

      loading.value = false
    }

    return {
      content,
      submit,
      loading,
      errors,
      noteId,
      formatTimeShort,
      formatTimeLong,
      createNote,
      deleteNote
    }
  }
})
</script>

<style scoped></style>
