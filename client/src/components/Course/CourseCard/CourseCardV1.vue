<template>
  <div class="course-card">
    <div>
      <router-link :to="{ name: 'course-details', params: { slug: course?.slug } }">
        <img :src="course?.thumbnail_url" class="w-full h-48 sm:h-36 object-cover object-center rounded-md" alt="Course Thumbnail" />
      </router-link>
    </div>
    <div class="pt-4 px-1 pb-2">
      <h5 class="mb-2 text-headingColor text-base font-extrabold leading-5 line-clamp-3">
        <router-link :to="{ name: 'course-details', params: { slug: course?.slug } }" class="hover:text-primaryColor transition-all duration-300">{{
          course?.title
        }}</router-link>
      </h5>
      <div class="mb-2 flex items-center">
        <StarRating :averageStar="averageStar" :size="12" />
        <span class="text-xs text-bodyColor ml-1 mt-1">({{ reviewCount }} Reviews)</span>
      </div>
      <div class="flex items-center">
        <span class="text-sm text-bodyColor font-extrabold">{{ formattedPrice }}</span>
        <!-- <span class="ml-[6px] text-sm text-bodyColor font-bold opacity-40 line-through">$25</span> -->
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from 'vue'
import { formatPrice } from '@/utils'

import StarRating from '@/components/StarRating/StarRating.vue'

export default defineComponent({
  components: { StarRating },
  props: {
    course: Object
  },
  setup(props) {
    const averageStar = ref(props.course?.average_star || 5)
    const reviewCount = ref(props.course?.review_count || 0)

    const formattedPrice = computed(() => {
      return props.course?.price > 0 ? formatPrice(props.course?.price) : 'Free'
    })

    return { averageStar, reviewCount, formattedPrice }
  }
})
</script>

<style scoped>
.course-card {
  width: 100%;
  height: 100%;
  padding: 10px;
  border-radius: 6px;
  box-shadow: 0px 6px 34px rgba(215, 216, 222, 0.4);
  transition: all 0.2s ease-in-out;
  @apply bg-whiteColor;
}

.course-card:hover {
  transform: translate3d(0, -2px, 0);
  /* transform: scale(1.01); */
}
</style>
