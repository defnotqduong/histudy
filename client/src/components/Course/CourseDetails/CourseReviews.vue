<template>
  <div>
    <div class="mt-8 p-7 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
      <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-[1px] border-borderColor">Review</h4>
      <div class="grid grid-cols-12 gap-8">
        <div class="col-span-3 mt-8">
          <div class="p-4 pb-6 flex flex-col items-center justify-center bg-warningOpacityColor">
            <div class="text-center text-6xl font-black text-headingColor">{{ formatAvgStar }}</div>
            <div class="mt-2 mb-1 flex items-center justify-center gap-1">
              <StarRating :averageStar="averageStar" :size="16" />
            </div>
            <span class="text-warningColor text-base font-bold">Course Rating</span>
          </div>
        </div>
        <div class="col-span-9 mt-8">
          <div class="flex flex-col gap-2">
            <div class="flex items-center justify-between">
              <StarRating :averageStar="5" :size="16" />
              <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                <div class="w-[60%] h-full bg-warningColor"></div>
              </div>
              <span class="font-semibold">60%</span>
            </div>
            <div class="flex items-center justify-between">
              <StarRating :averageStar="4" :size="16" />
              <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                <div class="w-[60%] h-full bg-warningColor"></div>
              </div>
              <span class="font-semibold">60%</span>
            </div>
            <div class="flex items-center justify-between">
              <StarRating :averageStar="3" :size="16" />
              <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                <div class="w-[60%] h-full bg-warningColor"></div>
              </div>
              <span class="font-semibold">60%</span>
            </div>
            <div class="flex items-center justify-between">
              <StarRating :averageStar="2" :size="16" />
              <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                <div class="w-[60%] h-full bg-warningColor"></div>
              </div>
              <span class="font-semibold">60%</span>
            </div>
            <div class="flex items-center justify-between">
              <StarRating :averageStar="1" :size="16" />
              <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                <div class="w-[60%] h-full bg-warningColor"></div>
              </div>
              <span class="font-semibold">60%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-8 p-7 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
      <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-[1px] border-borderColor">Featured review</h4>
      <div v-if="reviews?.length > 0">
        <div
          v-for="(review, index) in reviews"
          :key="review.id"
          :class="{ 'py-6': true, 'border-b-[1px]': index < reviews.length - 1, 'border-borderColor': index < reviews.length - 1 }"
        >
          <ReviewCard :review="review" />
        </div>
        <Pagination />
      </div>
      <div v-else class="italic">No reviews yet</div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from 'vue'
import { formatNumber } from '@/utils'

import StarRating from '@/components/StarRating/StarRating.vue'
import ReviewCard from '@/components/Review/ReviewCard.vue'
import Pagination from '@/components/Pagination/Pagination.vue'

export default defineComponent({
  components: { StarRating, ReviewCard, Pagination },
  props: {
    average_star: Number,
    review_count: Number,
    reviews: Array
  },
  setup(props) {
    const averageStar = ref(props.average_star || 5)
    const reviewCount = ref(props.review_count || 0)

    const formatAvgStar = computed(() => formatNumber(averageStar.value, 1))

    return { averageStar, reviewCount, formatAvgStar }
  }
})
</script>

<style></style>
