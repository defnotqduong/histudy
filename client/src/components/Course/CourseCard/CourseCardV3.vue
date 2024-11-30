<template>
  <div class="course-card">
    <div class="pb-6 relative">
      <router-link :to="{ name: 'course-details', params: { slug: course?.slug } }">
        <img :src="course?.thumbnail_url" class="w-full h-60 sm:h-44 md:h-52 lg:h-60 object-cover object-center rounded-md" alt="Course Thumbnail"
      /></router-link>
      <!-- <div class="absolute w-14 h-14 bottom-10 right-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 394 394" fill="none" class="w-full h-full">
          <path
            d="M157.027 24.5874C173.769 -7.90872 220.231 -7.90872 236.973 24.5874V24.5874C247.033 44.1139 269.728 53.5145 290.649 46.8207V46.8207C325.466 35.6809 358.319 68.5345 347.179 103.351V103.351C340.485 124.272 349.886 146.967 369.413 157.027V157.027C401.909 173.769 401.909 220.231 369.413 236.973V236.973C349.886 247.033 340.485 269.728 347.179 290.649V290.649C358.319 325.466 325.466 358.319 290.649 347.179V347.179C269.728 340.485 247.033 349.886 236.973 369.413V369.413C220.231 401.909 173.769 401.909 157.027 369.413V369.413C146.967 349.886 124.272 340.485 103.351 347.179V347.179C68.5345 358.319 35.6809 325.466 46.8207 290.649V290.649C53.5145 269.728 44.1139 247.033 24.5874 236.973V236.973C-7.90872 220.231 -7.90872 173.769 24.5874 157.027V157.027C44.1139 146.967 53.5145 124.272 46.8207 103.351V103.351C35.6809 68.5345 68.5345 35.6809 103.351 46.8207V46.8207C124.272 53.5145 146.967 44.1139 157.027 24.5874V24.5874Z"
            fill="url(#paint0_linear_1_4)"
          />
          <defs>
            <linearGradient id="paint0_linear_1_4" x1="55" y1="59" x2="336" y2="343" gradientUnits="userSpaceOnUse">
              <stop stop-color="#2F57EF" />
              <stop offset="1" stop-color="#B966E7" />
            </linearGradient>
          </defs>
        </svg>
        <div class="absolute w-full h-full top-0 left-0 flex flex-col items-center justify-center text-whiteColor text-xs font-bold">
          <span>-20%</span>
          <span>Off</span>
        </div>
      </div> -->
    </div>
    <div>
      <div class="mb-2 flex items-center justify-between">
        <div class="flex items-center gap-[1px]">
          <StarRating :averageStar="averageStar" :size="14" />
          <span class="text-sm text-bodyColor font-semibold ml-1 mt-[2px]">({{ reviewCount }} Reviews)</span>
        </div>
        <BookmarkButton :func="onChangeWishlist" :checked="isInWishlist" :loading="loading" />
      </div>
      <h4 class="mb-2 text-xl md:text-2xl font-black text-headingColor leading-tight line-clamp-3 hover:text-primaryColor transition-all duration-300">
        <router-link :to="{ name: 'course-details', params: { slug: course?.slug } }"> {{ course?.title }}</router-link>
      </h4>
      <ul class="mb-3 flex items-center justify-start gap-3">
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
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <span class="text-xl text-bodyColor font-extrabold">{{ formattedPrice }}</span>
          <!-- <span class="ml-2 text-xl text-bodyColor font-bold opacity-40 line-through">$25</span> -->
        </div>
        <button>
          <router-link
            :to="{ name: 'course-details', params: { slug: course.slug } }"
            class="flex items-center justify-center gap-1 font-bold text-headingColor cursor-pointer relative transition-all duration-[400ms] after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[2px] after:rounded after:bg-primaryColor hover:text-primaryColor hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-[400ms]"
            >Learn More
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                fill="currentColor"
              />
            </svg>
          </router-link>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from 'vue'
import { useUserStore } from '@/stores'
import { formatPrice } from '@/utils'
import { getWishlist, addCourseToWishlist, removeCourseFromWishlist } from '@/webServices/wishlistService'

import ButtonV1 from '@/components/Button/ButtonV1.vue'
import BookmarkButton from '@/components/Button/BookmarkButton.vue'
import StarRating from '@/components/StarRating/StarRating.vue'
export default defineComponent({
  components: { ButtonV1, StarRating, BookmarkButton },
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
  padding: 20px;
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
