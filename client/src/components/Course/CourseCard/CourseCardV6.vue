<template>
  <div class="course-card">
    <div class="pb-6 relative">
      <router-link :to="{ name: 'course-details', params: { slug: course?.slug } }"
        ><img :src="course?.thumbnail_url" class="w-full h-36 object-cover object-center rounded-md" alt="Course Thumbnail"
      /></router-link>
    </div>
    <div>
      <div class="mb-2 flex items-center justify-between">
        <div class="flex items-center gap-[1px]">
          <StarRating :averageStar="averageStar" :size="14" />
          <span class="text-sm text-bodyColor font-semibold ml-1 mt-[2px]">({{ reviewCount }} Reviews)</span>
        </div>
        <BookmarkButton :func="onChangeWishlist" :checked="isInWishlist" :loading="loading" />
      </div>
      <h4 class="mb-2 text-lg font-black text-headingColor leading-tight line-clamp-2 hover:text-primaryColor transition-all duration-300">
        <router-link :to="{ name: 'course-details', params: { slug: course?.slug } }"> {{ course?.title }}</router-link>
      </h4>
      <ul class="mb-5 flex flex-wrap items-center justify-start gap-3">
        <li class="text-sm text-bodyColor font-medium flex items-center justify-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.5 4.5C6.67157 4.5 6 5.17157 6 6V15.4013C6.44126 15.1461 6.95357 15 7.5 15H18V4.5H7.5ZM18 16.5H7.5C6.67157 16.5 6 17.1716 6 18C6 18.8284 6.67157 19.5 7.5 19.5H18V16.5ZM4.5 18L4.5 6C4.5 4.34315 5.84315 3 7.5 3H18.75L19.5 3.75V21H7.5C5.84315 21 4.5 19.6569 4.5 18Z"
              fill="currentColor"
            />
          </svg>
          <span>{{ course?.lesson_count }} Lessons</span>
        </li>
        <li class="text-sm text-bodyColor font-medium flex items-center justify-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
            <path
              d="M19 15C21.2091 15 23 16.7909 23 19V21H21M16 10.874C17.7252 10.4299 19 8.86383 19 6.99999C19 5.13615 17.7252 3.57005 16 3.12601M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7ZM5 15H13C15.2091 15 17 16.7909 17 19V21H1V19C1 16.7909 2.79086 15 5 15Z"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <span>{{ course?.customer_count }} Students</span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from 'vue'
import { useUserStore } from '@/stores'
import { formatPrice } from '@/utils'
import { getWishlist, addCourseToWishlist, removeCourseFromWishlist } from '@/webServices/wishlistService'

import BookmarkButton from '@/components/Button/BookmarkButton.vue'
import StarRating from '@/components/StarRating/StarRating.vue'

export default defineComponent({
  components: { StarRating, BookmarkButton },
  props: {
    course: Object
  },
  setup(props) {
    const userStore = useUserStore()

    const loading = ref(false)
    const id = ref(props.course?.id)

    const averageStar = ref(props.course?.average_star || 5)
    const reviewCount = ref(props.course?.review_count || 0)

    const formattedPrice = computed(() => {
      return props.course?.price > 0 ? formatPrice(props.course?.price) : 'Free'
    })

    const isInWishlist = computed(() => {
      return userStore.wishlist.some(course => course?.id === props.course?.id)
    })

    const onChangeWishlist = async () => {
      loading.value = true
      if (!isInWishlist.value) {
        const res = await addCourseToWishlist({ courseId: id.value })

        if (res.success) userStore.setWishlist(res.wishlist.courses)
      } else {
        const res = await removeCourseFromWishlist(id.value)

        if (res.success) userStore.setWishlist(res.wishlist.courses)
      }

      loading.value = false
    }

    return { loading, averageStar, reviewCount, formattedPrice, isInWishlist, onChangeWishlist }
  }
})
</script>

<style scoped>
.course-card {
  width: 100%;
  height: 100%;
  padding: 30px 30px;
  border-radius: 10px;
  box-shadow: 0px 6px 34px rgba(215, 216, 222, 0.4);
  transition: all 0.3s;
  @apply bg-whiteColor;
}

.course-card:hover {
  /* transform: scale(1.02); */
  transform: translateY(-6px);
}
</style>
