<template>
  <div class="course-card">
    <div class="pb-7 relative">
      <router-link :to="{ name: 'course-details', params: { slug: course?.slug } }"
        ><img :src="course?.thumbnail_url" class="w-full h-64 object-cover object-center rounded-md" alt="Course Thumbnail"
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
        <button
          class="relative w-9 h-9 flex items-center justify-center group after:absolute after:content after:left-0 after:top-0 after:w-full after:h-full after:rounded-full after:bg-grayLightColor after:opacity-0 after:transition-all after:duration-[400ms] hover:after:scale-[1.2] hover:after:opacity-100"
          title="Bookmark"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 64 64"
            fill="none"
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1] w-[18px] h-[18px] text-headingColor transition-all duration-[400ms] group-hover:text-primaryColor"
          >
            <path
              d="M30.051 45.6071L17.851 54.7401C17.2728 55.1729 16.5856 55.4363 15.8662 55.5008C15.1468 55.5652 14.4237 55.4282 13.7778 55.1049C13.1319 54.7817 12.5887 54.2851 12.209 53.6707C11.8293 53.0563 11.6281 52.3483 11.628 51.626V15.306C11.628 13.2423 12.4477 11.2631 13.9069 9.8037C15.3661 8.34432 17.3452 7.52431 19.409 7.52405H45.35C47.4137 7.52431 49.3929 8.34432 50.8521 9.8037C52.3112 11.2631 53.131 13.2423 53.131 15.306V51.625C53.1309 52.3473 52.9297 53.0553 52.55 53.6697C52.1703 54.2841 51.6271 54.7807 50.9812 55.1039C50.3353 55.4272 49.6122 55.5642 48.8928 55.4998C48.1734 55.4353 47.4862 55.1719 46.908 54.739L34.715 45.6071C34.0419 45.1031 33.2238 44.8308 32.383 44.8308C31.5422 44.8308 30.724 45.1031 30.051 45.6071V45.6071Z"
              stroke="currentColor"
              stroke-width="5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </div>
      <h4 class="mb-2 text-2xl font-black text-headingColor leading-tight line-clamp-3 hover:text-primaryColor transition-all duration-300">
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
            /></svg
          ><span>{{ course?.lesson_count }} Lessons</span>
        </li>
        <li class="text-sm text-bodyColor font-medium flex items-center justify-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
            <path
              d="M19 15C21.2091 15 23 16.7909 23 19V21H21M16 10.874C17.7252 10.4299 19 8.86383 19 6.99999C19 5.13615 17.7252 3.57005 16 3.12601M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7ZM5 15H13C15.2091 15 17 16.7909 17 19V21H1V19C1 16.7909 2.79086 15 5 15Z"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            /></svg
          ><span>{{ course?.customer_count }} Students</span>
        </li>
      </ul>
      <p class="mb-5 text-lg text-bodyColor font-medium line-clamp-4">
        {{ course?.summary }}
      </p>
      <div class="mb-4 flex items-center justify-start">
        <div class="w-10 h-10 p-[2px] border-2 border-primaryOpacityColor rounded-full mr-2">
          <img :src="course?.instructor?.avatar" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
        </div>
        <div class="text-sm font-medium">
          By
          <span class="text-headingColor font-bold transition-all duration-300 hover:text-primaryColor">{{ course?.instructor?.name }}</span>
          <template v-if="course?.instructor?.profession">
            In
            <span class="text-headingColor font-bold transition-all duration-300 hover:text-primaryColor">{{ course?.instructor?.profession }}</span>
          </template>
        </div>
      </div>
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <span class="text-xl text-bodyColor font-extrabold">{{ formattedPrice }}</span>
          <!-- <span class="ml-[6px] text-xl text-bodyColor font-bold opacity-40 line-through">$25</span> -->
        </div>
        <button>
          <router-link
            :to="{ name: 'course-details', params: { slug: 1 } }"
            class="flex items-center justify-center gap-1 font-bold text-headingColor cursor-pointer relative transition-all duration-[400ms] after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[2px] after:rounded after:bg-primaryColor hover:text-primaryColor hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-[400ms]"
            >Learn More
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                fill="currentColor"
              /></svg
          ></router-link>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from 'vue'
import { formatPrice } from '@/utils'

import ButtonV1 from '@/components/Button/ButtonV1.vue'
import StarRating from '@/components/StarRating/StarRating.vue'

export default defineComponent({
  components: { ButtonV1, StarRating },
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
