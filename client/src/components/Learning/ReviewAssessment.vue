<template>
  <div class="mt-4">
    <h4 class="mb-4 text-primaryColor text-lg font-bold">
      {{ currentCompletedAssessment.assessment.title }}
    </h4>
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-8">
        <div v-for="(question, qIndex) in currentCompletedAssessment.questions" :key="qIndex" class="mb-4">
          <p class="text-headingColor font-bold">
            {{ qIndex + 1 + '. ' + question.content }}
          </p>
          <ul class="mt-2">
            <li v-for="(ans, aIndex) in question.answers" :key="aIndex" class="mb-1 flex items-center justify-start gap-1">
              <span
                class="w-3 h-3 flex items-center justify-center rounded-full border"
                :class="{
                  'border-primaryColor': ans.is_correct || isUserSelectedCorrectAnswer(question.id, ans.id),
                  'border-dangerColor': isUserSelectedWrongAnswer(question.id, ans.id),
                  'border-bodyColor': !ans.is_correct && !isUserSelectedAnswer(question.id, ans.id)
                }"
              >
                <span
                  class="w-3/4 h-3/4 rounded-full"
                  :class="{
                    'bg-primaryColor': ans.is_correct || isUserSelectedCorrectAnswer(question.id, ans.id),
                    'bg-dangerColor': isUserSelectedWrongAnswer(question.id, ans.id),
                    'bg-transparent': !ans.is_correct && !isUserSelectedAnswer(question.id, ans.id)
                  }"
                ></span>
              </span>
              <span
                class="ml-2"
                :class="{
                  'text-primaryColor': ans.is_correct || isUserSelectedCorrectAnswer(question.id, ans.id),
                  'text-dangerColor': isUserSelectedWrongAnswer(question.id, ans.id),
                  'text-headingColor': !ans.is_correct && !isUserSelectedAnswer(question.id, ans.id)
                }"
              >
                {{ ans.content }}
              </span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-span-4">
        <h5 class="text-lg text-headingColor font-bold">Evaluate:</h5>
        <div class="text-headingColor font-semibold">
          Correct Answers: <span class="text-primaryColor font-bold">{{ correctAnswersCount }} / {{ totalQuestions }}</span>
        </div>
        <div class="text-headingColor font-semibold">
          Score: <span class="text-dangerColor font-bold">{{ currentCompletedAssessment.userAssessment.score }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  props: {
    currentCompletedAssessment: Object
  },
  setup(props) {
    const isUserSelectedAnswer = (questionId, answerId) => {
      return props.currentCompletedAssessment.userAnswers.some(ua => ua.question.id === questionId && ua.selectedAnswer.id === answerId)
    }

    const isUserSelectedCorrectAnswer = (questionId, answerId) => {
      return props.currentCompletedAssessment.userAnswers.some(ua => ua.question.id === questionId && ua.selectedAnswer.id === answerId && ua.isCorrect === 1)
    }

    const isUserSelectedWrongAnswer = (questionId, answerId) => {
      return props.currentCompletedAssessment.userAnswers.some(ua => ua.question.id === questionId && ua.selectedAnswer.id === answerId && ua.isCorrect === 0)
    }

    const totalQuestions = props.currentCompletedAssessment.questions.length

    const correctAnswersCount = props.currentCompletedAssessment.userAnswers.filter(ua => ua.isCorrect === 1).length

    return {
      isUserSelectedAnswer,
      isUserSelectedCorrectAnswer,
      isUserSelectedWrongAnswer,
      totalQuestions,
      correctAnswersCount
    }
  }
})
</script>

<style></style>
