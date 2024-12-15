<template>
  <div class="mt-4">
    <h4 class="mb-4 text-primaryColor text-lg font-bold">{{ currentCompletedAssessment.assessment.title }}</h4>
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-9">
        <div v-for="(question, qIndex) in currentCompletedAssessment.questions" :key="qIndex" class="mb-4">
          <p class="text-headingColor font-bold">{{ qIndex + 1 + '. ' + question.content }}</p>
          <ul class="mt-2">
            <li v-for="(ans, aIndex) in question.answers" :key="aIndex" class="mb-1 flex items-center justify-start gap-1">
              <span
                class="w-3 h-3 flex items-center justify-center rounded-full border"
                :class="question.is_correct ? 'border-primaryColor' : 'border-bodyColor'"
              >
                <span class="w-3/4 h-3/4 rounded-full" :class="question.is_correct ? 'bg-primaryColor' : 'bg-bodyColor'"></span>
              </span>
              <span class="ml-2 text-headingColor">{{ ans.content }}</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-span-3">Score</div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: { currentCompletedAssessment: Object },
  setup(props) {
    const isUserAnswerCorrect = (questionId, answerId) => {
      const userAnswer = props.currentCompletedAssessment.userAnswers.find(ua => ua.question.id === questionId && ua.selectedAnswer.id === answerId)
      return userAnswer ? userAnswer.isCorrect : false
    }

    return { isUserAnswerCorrect }
  }
})
</script>

<style></style>
