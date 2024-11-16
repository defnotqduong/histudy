<template>
  <div class="h-full w-80 relative border-l border-borderColor overflow-auto custom-scrollbar">
    <div class="px-4 py-4 border-b border-borderColor">
      <div class="flex items-center justify-between text-headingColor font-bold">
        <span>Review</span>
        <button @click="toggleCourseReviewModal">
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
      <template v-if="!review">
        <h4 class="text-center text-headingColor font-bold">How would you rate this course?</h4>
        <form @submit.prevent="submit">
          <div class="mb-2 flex items-center justify-center">
            <div class="rating">
              <input value="5" v-model="rating" name="rating" id="star5" type="radio" />
              <label for="star5"></label>
              <input value="4" v-model="rating" name="rating" id="star4" type="radio" />
              <label for="star4"></label>
              <input value="3" v-model="rating" name="rating" id="star3" type="radio" />
              <label for="star3"></label>
              <input value="2" v-model="rating" name="rating" id="star2" type="radio" />
              <label for="star2"></label>
              <input value="1" v-model="rating" name="rating" id="star1" type="radio" />
              <label for="star1"></label>
            </div>
          </div>
          <textarea
            v-model="content"
            class="w-full min-h-28 p-2 text-headingColor border border-borderColor outline-none rounded-md resize-none focus:border-headingColor"
            placeholder="Write your feedback..."
          ></textarea>
          <div class="mt-2 flex justify-end">
            <button
              type="submit"
              :disabled="loading"
              :class="{ 'cursor-not-allowed': loading }"
              class="px-4 py-1 text-whiteColor bg-thirtyColor rounded-md transition-all duration-200 hover:opacity-90"
            >
              Save
            </button>
          </div>
        </form>
      </template>
      <template v-else>
        <h4 class="text-center text-headingColor font-bold">Your review of the course</h4>
        <div class="flex items-center justify-center">
          <div class="rating">
            <span class="star" :class="{ active: review?.rating >= 1 }"></span>
            <span class="star" :class="{ active: review?.rating >= 2 }"></span>
            <span class="star" :class="{ active: review?.rating >= 3 }"></span>
            <span class="star" :class="{ active: review?.rating >= 4 }"></span>
            <span class="star" :class="{ active: review?.rating >= 5 }"></span>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { formatTimeLong, formatTimeShort } from '@/utils'
import { reviewCourse } from '@/webServices/learningService'

import StarRating from '@/components/StarRating/StarRating.vue'

export default defineComponent({
  components: { StarRating },
  props: {
    courseId: Number,
    review: Object,
    updateReview: Function,
    isShowCourseReviewModal: Boolean,
    toggleCourseReviewModal: Function
  },
  setup(props) {
    const userStore = useUserStore()
    const homeStore = useHomeStore()

    const content = ref('')
    const rating = ref(null)
    const loading = ref(false)

    const submit = async () => {
      if (!rating.value) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Please select a rating before submitting your review.' })
        return
      }
      loading.value = true

      const res = await reviewCourse(props.courseId, {
        content: content.value,
        rating: rating.value
      })

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: res.data.message })
      }

      if (res.success) {
        props.updateReview(res.review)
      }

      loading.value = false
    }

    return {
      content,
      rating,
      loading,
      submit
    }
  }
})
</script>

<style scoped>
.rating {
  display: inline-block;
}

.rating input {
  display: none;
}

.rating label {
  float: right;
  cursor: pointer;
  color: #ccc;
  transition: color 0.3s;
}

.rating label:before,
.rating .star:before {
  content: '\2605';
  font-size: 40px;
}

.rating .star.active {
  @apply text-warningColor;
}

.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
  transition: color 0.3s;
  @apply text-warningColor;
}
</style>
