<template>
  <div class="mt-20">
    <div v-for="(question, index) in currentAssessment.questions" :key="index" class="mb-4">
      <p class="text-headingColor font-bold">{{ index + 1 + '. ' + question.content }}</p>
      <ul class="mt-2">
        <li v-for="(ans, index) in question.answers" :key="index" class="mb-1">
          <button @click="selectAnswer(question.id, ans.id)">
            <span
              class="w-3 h-3 flex items-center justify-center rounded-full border"
              :class="isSelected(question.id, ans.id) ? 'border-primaryColor' : 'border-bodyColor'"
            >
              <span class="w-3/4 h-3/4 rounded-full" :class="isSelected(question.id, ans.id) ? 'bg-primaryColor' : 'bg-transparent'"></span>
            </span>
          </button>
          <span class="ml-2 text-headingColor">{{ ans.content }}</span>
        </li>
      </ul>
    </div>
    <div class="mt-6">
      <button @click.prevent="submit" class="ml-auto px-4 py-2 text-whiteColor bg-primaryColor rounded-lg transition-all duration-300 hover:bg-thirtyColor">
        Submit
      </button>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
export default defineComponent({
  props: { currentAssessment: Object, submitAss: Function },
  setup(props) {
    const userAnswers = ref([])

    const selectAnswer = (questionId, answerId) => {
      const existingAnswer = userAnswers.value.find(ans => ans.question_id === questionId)

      if (existingAnswer) {
        existingAnswer.answer_id = answerId
      } else {
        userAnswers.value.push({ question_id: questionId, answer_id: answerId })
      }
    }

    const isSelected = (questionId, answerId) => {
      return userAnswers.value.some(ans => ans.question_id === questionId && ans.answer_id === answerId)
    }

    const submit = async () => {
      await props.submitAss({ answers: userAnswers.value })
    }

    return { userAnswers, selectAnswer, isSelected, submit }
  }
})
</script>

<style></style>
