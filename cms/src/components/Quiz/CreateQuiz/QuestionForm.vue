<template>
  <div class="mt-4 py-4 px-6 bg-lighterColor rounded-md">
    <div class="font-bold text-headingColor flex items-start justify-between">
      Questions
      <button class="flex items-center gap-2">
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
        Add a question
      </button>
    </div>
    <p v-if="questions.length === 0" class="mt-2 italic text-bodyColor">No questions</p>
    <QuestionList v-else :questions="questions" />
    <div class="text-sm text-muted-foreground mt-4">Drag and drop to render the questions</div>
  </div>
</template>

<script>
import { defineComponent, ref, watch } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'

import QuestionList from '@/components/Quiz/CreateQuiz/QuestionList.vue'

export default defineComponent({
  components: { QuestionList },
  props: { slug: String, id: String, questions: Array, fetchData: Function },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()

    return {}
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
