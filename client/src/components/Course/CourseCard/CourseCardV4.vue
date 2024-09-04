<template>
  <div class="course-card">
    <div class="pb-6 relative">
      <router-link :to="{ name: 'course-details', params: { slug: course?.slug } }"
        ><img :src="course?.thumbnail_url" class="w-full h-48 object-cover object-center rounded-md" alt="Course Thumbnail"
      /></router-link>
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
      <div class="mb-5 relative">
        <h6 class="mb-2 text-xs text-headingColor font-bold uppercase opacity-60">Complete</h6>
        <div class="h-[6px] bg-progressColor rounded-lg">
          <div class="w-[40%] h-full bg-successColor rounded-lg"></div>
        </div>
        <span class="text-sm text-bodyColor font-bold uppercase opacity-60 absolute right-0 top-0">40%</span>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from 'vue'

import StarRating from '@/components/StarRating/StarRating.vue'

export default defineComponent({
  components: { StarRating },
  props: {
    course: Object
  },
  setup(props) {
    const averageStar = ref(props.course?.average_star || 5)
    const reviewCount = ref(props.course?.review_count || 0)

    return { averageStar, reviewCount }
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
