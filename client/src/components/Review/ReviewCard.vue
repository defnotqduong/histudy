<template>
  <div class="flex items-start justify-start">
    <div class="mr-4 lg:mr-8">
      <img :src="review?.user?.avatar" class="max-w-16 max-h-16 lg:max-h-24 lg:max-w-24 object-cover object-center rounded-md" alt="Student Avt" />
    </div>
    <div>
      <h5 class="text-headingColor text-base md:text-lg xl:text-xl font-extrabold transition-all duration-300 hover:text-primaryColor">
        {{ review?.user?.name }}
      </h5>
      <StarRating class="mt-1 mb-2" :averageStar="review?.rating" :size="16" />
      <p class="text-lg text-bodyColor">{{ review?.content }}</p>
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
