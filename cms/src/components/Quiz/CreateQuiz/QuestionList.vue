<template>
  <div class="mt-6">
    <div v-for="(question, index) in questions" :key="index">
      <div class="bg-whiteColor px-3 py-3 border text-headingColor rounded-md mb-4">
        <div class="flex items-start justify-between gap-x-3">
          <div class="flex items-start gap-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 1024 1024" class="mt-1">
              <path
                fill="currentColor"
                d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm23.744 191.488c-52.096 0-92.928 14.784-123.2 44.352-30.976 29.568-45.76 70.4-45.76 122.496h80.256c0-29.568 5.632-52.8 17.6-68.992 13.376-19.712 35.2-28.864 66.176-28.864 23.936 0 42.944 6.336 56.32 19.712 12.672 13.376 19.712 31.68 19.712 54.912 0 17.6-6.336 34.496-19.008 49.984l-8.448 9.856c-45.76 40.832-73.216 70.4-82.368 89.408-9.856 19.008-14.08 42.24-14.08 68.992v9.856h80.96v-9.856c0-16.896 3.52-31.68 10.56-45.76 6.336-12.672 15.488-24.64 28.16-35.2 33.792-29.568 54.208-48.576 60.544-55.616 16.896-22.528 26.048-51.392 26.048-86.592 0-42.944-14.08-76.736-42.24-101.376-28.16-25.344-65.472-37.312-111.232-37.312zm-12.672 406.208a54.272 54.272 0 0 0-38.72 14.784 49.408 49.408 0 0 0-15.488 38.016c0 15.488 4.928 28.16 15.488 38.016A54.848 54.848 0 0 0 523.072 768c15.488 0 28.16-4.928 38.72-14.784a51.52 51.52 0 0 0 16.192-38.72 51.968 51.968 0 0 0-15.488-38.016 55.936 55.936 0 0 0-39.424-14.784z"
              />
            </svg>
            <span class="font-semibold">{{ question.content }}</span>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <label
              for="my_modal_edit_question"
              @click="changeQuestion(index)"
              class="px-2 py-1 text-primaryColor bg-primaryOpacityColor rounded-md cursor-pointer"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="14" height="14" viewBox="0 0 24 24">
                <path
                  d="M17.764,2A4.2,4.2,0,0,0,14.77,3.241L3.155,14.855a1,1,0,0,0-.28.55l-.863,5.438a1,1,0,0,0,1.145,1.145L8.6,21.125a1,1,0,0,0,.55-.28L20.759,9.23a4.236,4.236,0,0,0-3-7.23ZM7.96,19.2,4.2,19.8l.6-3.757,8.39-8.391,3.162,3.162ZM19.345,7.816,17.765,9.4,14.6,6.235l1.581-1.58a2.289,2.289,0,0,1,3.161,0,2.234,2.234,0,0,1,0,3.161Z"
                />
              </svg>
            </label>
            <label :for="'my_modal_' + question?.id" class="px-2 py-1 text-dangerColor bg-dangerOpacityColor rounded-md cursor-pointer">
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
            </label>
            <input type="checkbox" :id="'my_modal_' + question?.id" class="modal-toggle" />
            <div class="modal" role="dialog">
              <div class="modal-box bg-white p-8 flex flex-col gap-8">
                <div class="flex flex-col items-start justify-start">
                  <h5 class="text-lg font-extrabold text-headingColor mb-2">Are you sure?</h5>
                  <p class="text-base text-headingColor">This action cannot be undone.</p>
                </div>
                <div class="flex items-center justify-end gap-3">
                  <div class="modal-action">
                    <label
                      :for="'my_modal_' + question?.id"
                      class="btn px-3 h-10 min-h-10 bg-whiteColor text-headingColor border border-borderColor hover:bg-whiteColor hover:border-borderColor"
                      >Cancel</label
                    >
                  </div>
                  <div class="modal-action">
                    <button
                      @click="onDeleteQuestion(question?.id)"
                      :disabled="isSubmitting"
                      :class="isSubmitting && 'opacity-75 cursor-no-drop'"
                      class="px-3 h-10 min-h-10 text-whiteColor bg-blackColor rounded-md"
                    >
                      Continue
                    </button>
                  </div>
                </div>
              </div>
              <label class="modal-backdrop" :for="'my_modal_' + question?.id">Close</label>
            </div>
          </div>
        </div>
        <ul class="mt-2">
          <li v-for="ans in question.answers" :key="ans.id" class="mb-2 flex items-center justify-start gap-x-4">
            <span class="w-3 h-3 flex items-center justify-center rounded-full border" :class="ans.is_correct ? 'border-primaryColor' : 'border-bodyColor'">
              <span class="w-3/4 h-3/4 rounded-full" :class="ans.is_correct ? 'bg-primaryColor' : 'bg-transparent'"></span>
            </span>
            <span>{{ ans.content }}</span>
          </li>
        </ul>
      </div>
    </div>
    <input type="checkbox" id="my_modal_edit_question" class="modal-toggle" ref="modalEdit" />
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
              for="my_modal_edit_question"
              class="btn px-3 h-10 min-h-10 bg-whiteColor text-headingColor border border-borderColor hover:bg-whiteColor hover:border-borderColor"
              >Cancel</label
            >
          </div>
          <div class="modal-action">
            <button
              @click="onEditQuestion(id)"
              :disabled="isSubmitting"
              :class="isSubmitting && 'opacity-75 cursor-no-drop'"
              class="px-3 h-10 min-h-10 text-whiteColor bg-blackColor rounded-md"
            >
              Edit
            </button>
          </div>
        </div>
      </div>
      <label class="modal-backdrop" for="my_modal_edit_question">Close</label>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, reactive, watch, toRefs, computed } from 'vue'
import { editQuestion, deleteQuestion } from '@/webServices/assessmentService'

export default defineComponent({
  components: {},
  props: {
    slug: String,
    id: String,
    questions: Array,
    getQuestions: Function
  },
  setup(props) {
    const isSubmitting = ref(false)

    const modalEdit = ref(null)

    const question = reactive({
      id: null,
      content: '',
      answers: []
    })

    const errors = ref({})

    const changeQuestion = index => {
      const selectedQuestion = props.questions[index]

      question.id = selectedQuestion.id
      question.content = selectedQuestion.content
      question.answers = JSON.parse(JSON.stringify(selectedQuestion.answers))
    }

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

    const onEditQuestion = async questionId => {
      isSubmitting.value = true
      errors.value = {}

      const res = await editQuestion(props.slug, props.id, questionId, question)

      if (res.success) {
        props.getQuestions(props.slug, props.id)
        if (modalEdit.value) {
          modalEdit.value.checked = false
        }
      }

      if (!res.success) errors.value = res.data.errors

      isSubmitting.value = false
    }

    const onDeleteQuestion = async questionId => {
      isSubmitting.value = true
      const res = await deleteQuestion(props.slug, props.id, questionId)

      if (res.success) props.getQuestions()

      isSubmitting.value = false
    }

    const filteredAnswers = computed(() => {
      return question.answers.filter(ans => !ans.delete)
    })

    return {
      isSubmitting,
      modalEdit,
      ...toRefs(question),
      errors,
      filteredAnswers,
      changeQuestion,
      onAddAns,
      onCorrectAnswerSelected,
      onDeleteAnswer,
      onEditQuestion,
      onDeleteQuestion
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
