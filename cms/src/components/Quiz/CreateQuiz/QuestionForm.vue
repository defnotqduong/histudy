<template>
  <div class="mt-4 py-4 px-6 bg-lighterColor rounded-md">
    <div class="font-bold text-headingColor flex items-start justify-between">
      Questions
      <label for="my_modal_add_question" class="flex items-center gap-2 cursor-pointer">
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
      </label>
      <input type="checkbox" id="my_modal_add_question" class="modal-toggle" ref="modalCreate" />
      <div class="modal" role="dialog">
        <div class="modal-box bg-white p-8 flex flex-col gap-8">
          <div class="input-group">
            <div class="mb-2">Question:</div>
            <input type="text" v-model="content" placeholder="" />
            <div v-if="errors?.content && errors?.content.length > 0">
              <p v-for="(err, index) in errors?.content" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
            </div>
          </div>
          <div>
            <div class="mb-2 flex items-center justify-between">
              <span>Answers:</span>
              <button @click="onAddAns" class="flex items-center gap-1 px-2 py-1 text-whiteColor text-sm bg-primaryColor rounded-md">Add</button>
            </div>
            <table class="table table-pin-rows" v-if="answers.length > 0">
              <thead>
                <tr>
                  <th class="w-3/4">Content</th>
                  <th class="text-center">Is correct</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(ans, index) in filteredAnswers" :key="index">
                  <td class="w-3/4">
                    <div class="input-group">
                      <input type="text" v-model="ans.content" placeholder="" />
                    </div>
                  </td>
                  <td class="text-center">
                    <button @click="onCorrectAnswerSelected(index)">
                      <span
                        class="w-5 h-5 flex items-center justify-center rounded-full border"
                        :class="ans.is_correct ? 'border-primaryColor' : 'border-bodyColor'"
                      >
                        <span class="w-3/4 h-3/4 rounded-full" :class="ans.is_correct ? 'bg-primaryColor' : 'bg-transparent'"></span>
                      </span>
                    </button>
                  </td>
                  <td class="text-center">
                    <button @click="onDeleteAnswer(index)" class="px-2 py-1 text-dangerColor bg-dangerOpacityColor rounded-md cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none">
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
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="flex items-center justify-end gap-3">
            <div class="modal-action">
              <label
                for="my_modal_add_question"
                class="btn px-3 h-10 min-h-10 bg-whiteColor text-headingColor border border-borderColor hover:bg-whiteColor hover:border-borderColor"
                >Cancel</label
              >
            </div>
            <div class="modal-action">
              <button
                @click="onCreateQuestion"
                :disabled="isSubmitting"
                :class="isSubmitting && 'opacity-75 cursor-no-drop'"
                class="px-3 h-10 min-h-10 text-whiteColor bg-blackColor rounded-md"
              >
                Create
              </button>
            </div>
          </div>
        </div>
        <label class="modal-backdrop" for="my_modal_add_question">Close</label>
      </div>
    </div>
    <p v-if="questions.length === 0" class="mt-2 italic text-bodyColor">No questions</p>
    <QuestionList v-else :slug="slug" :id="id" :questions="questions" :getQuestions="getQuestions" />
  </div>
</template>

<script>
import { defineComponent, reactive, ref, toRefs, watch, computed } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'
import { createQuestion } from '@/webServices/assessmentService'

import QuestionList from '@/components/Quiz/CreateQuiz/QuestionList.vue'

export default defineComponent({
  components: { QuestionList },
  props: {
    slug: String,
    id: String,
    questions: Array,
    fetchData: Function,
    getQuestions: Function
  },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()

    const modalCreate = ref(null)

    const question = reactive({
      content: '',
      answers: []
    })
    const errors = ref({})
    const isSubmitting = ref(false)

    const onAddAns = () => {
      question.answers.push({
        content: '',
        is_correct: false,
        delete: false
      })
    }

    const onCorrectAnswerSelected = index => {
      question.answers.forEach((ans, i) => {
        ans.is_correct = i === index
      })
    }

    const onDeleteAnswer = index => {
      question.answers[index].delete = true
    }

    const onCreateQuestion = async () => {
      isSubmitting.value = true
      errors.value = {}

      const res = await createQuestion(props.slug, props.id, question)

      if (res.success) {
        props.getQuestions(props.slug, props.id)
        if (modalCreate.value) {
          modalCreate.value.checked = false
        }
      }

      if (!res.success) errors.value = res.data.errors

      isSubmitting.value = false
    }

    const filteredAnswers = computed(() => {
      return question.answers.filter(ans => !ans.delete)
    })

    return {
      modalCreate,
      ...toRefs(question),
      errors,
      isSubmitting,
      filteredAnswers,
      onAddAns,
      onCorrectAnswerSelected,
      onDeleteAnswer,
      onCreateQuestion
    }
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
  @apply font-medium text-headingColor bg-whiteColor border-borderColor;
}

.input-group input:focus,
.input-group .textarea:focus {
  @apply border-primaryColor;
}

.table thead {
}
.table th {
  @apply py-1 px-1 text-base text-headingColor font-bold;
}

.table td {
  @apply py-1 px-1;
}

.table thead tr,
.table tbody tr {
  border-bottom: none;
}

.table tbody tr {
  @apply text-base text-headingColor;
}
</style>
