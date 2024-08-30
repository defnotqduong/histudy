<template>
  <div class="flex items-start justify-start">
    <div class="mr-8">
      <img :src="review?.user?.avatar" class="max-h-[105px] max-w-[105px] object-cover object-center rounded-md" alt="Student Avt" />
    </div>
    <div>
      <h5 class="text-headingColor text-xl font-extrabold transition-all duration-300 hover:text-primaryColor">{{ review?.user?.name }}</h5>
      <StarRating class="mt-1 mb-2" :averageStar="review?.rating" :size="16" />
      <p class="text-lg text-bodyColor">{{ review?.comment }}</p>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import StarRating from '@/components/StarRating/StarRating.vue'
export default defineComponent({
  components: { StarRating },
  props: {
    review: Object
  }
})
</script>

<style></style>
