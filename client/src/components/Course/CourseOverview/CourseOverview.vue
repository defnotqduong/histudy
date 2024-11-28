<template>
  <div class="relative min-h-[420px] pt-12 pb-16 bg-cover bg-center" :style="{ backgroundImage: `url(${bgImage10})` }">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12">
        <div class="col-span-12 lg:col-span-8 lg:pr-[16%]">
          <div class="breadcrumbs text-sm text-headingColor">
            <ul>
              <li class="hover:text-primaryColor transition-all duration-300"><router-link :to="{ name: 'home' }">Home</router-link></li>
              <li class="opacity-60">{{ category?.name }}</li>
            </ul>
          </div>
          <div class="my-6 flex items-center justify-start">
            <h1 class="text-3xl sm:text-4xl xl:text-5xl text-headingColor font-black">{{ course?.title }}</h1>
          </div>
          <p class="mb-5 text-base lg:text-lg text-headingColor" v-html="course?.summary"></p>
          <div class="mb-5 flex flex-wrap items-center justify-start gap-4">
            <div
              class="px-5 h-12 flex items-center justify-center gap-2 text-sm text-headingColor font-bold bg-badgeColor shadow-shadow04 rounded-full border-[1px] border-whiteColor"
            >
              <span><img src="@/assets/images/card-icon-01.jpg" class="w-[30px] h-[30px] object-cover object-center" alt="Seller" /></span>
              BestSeller
            </div>
            <div class="flex items-center gap-[1px]">
              <span class="text-sm text-headingColor font-bold mr-2 mt-1">{{ fmAvgStar }}</span>
              <StarRating :averageStar="avgStar" :size="14" />
            </div>
            <div>
              <span class="text-sm font-bold text-headingColor">{{ course?.review_count }} rating</span>
            </div>
            <div>
              <span class="text-sm font-bold text-headingColor">{{ course?.customer_count + ' Students' }}</span>
            </div>
          </div>
          <div class="mb-4 flex items-center justify-start">
            <div class="w-10 h-10 p-[2px] border-2 border-primaryOpacityColor rounded-full mr-2">
              <img :src="instructor?.info?.avatar" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
            </div>
            <div class="text-sm font-medium">
              By
              <span class="text-headingColor font-bold">{{ instructor?.info?.name }}</span>
              <template v-if="instructor?.info?.profession">
                In
                <span class="text-headingColor font-bold">{{ instructor?.info?.profession }}</span>
              </template>
            </div>
          </div>
          <ul class="text-sm text-headingColor font-medium flex flex-wrap items-center justify-start gap-4">
            <li class="flex items-center justify-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M6 2C6 1.44772 6.44772 1 7 1C7.55228 1 8 1.44772 8 2V3H16V2C16 1.44772 16.4477 1 17 1C17.5523 1 18 1.44772 18 2V3H19C20.6569 3 22 4.34315 22 6V20C22 21.6569 20.6569 23 19 23H5C3.34315 23 2 21.6569 2 20V6C2 4.34315 3.34315 3 5 3H6V2ZM16 5V6C16 6.55228 16.4477 7 17 7C17.5523 7 18 6.55228 18 6V5H19C19.5523 5 20 5.44772 20 6V9H4V6C4 5.44772 4.44772 5 5 5H6V6C6 6.55228 6.44772 7 7 7C7.55228 7 8 6.55228 8 6V5H16ZM4 11V20C4 20.5523 4.44772 21 5 21H19C19.5523 21 20 20.5523 20 20V11H4Z"
                  fill="currentColor"
                />
              </svg>
              <span>Last updated {{ formatDateShort(course?.updated_at) }}</span>
            </li>
            <li class="flex items-center justify-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none">
                <path
                  d="M2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12Z"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M13 2.04932C13 2.04932 16 5.99994 16 11.9999C16 17.9999 13 21.9506 13 21.9506"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M11 21.9506C11 21.9506 8 17.9999 8 11.9999C8 5.99994 11 2.04932 11 2.04932"
                  stroke="currentColor"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path d="M2.62964 15.5H21.3704" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2.62964 8.5H21.3704" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <span>English</span>
            </li>
            <li v-if="cert" class="flex items-center justify-center gap-1">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="14"
                height="14"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <circle cx="12" cy="8" r="7" />
                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
              </svg>
              <span>Certified Course</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from 'vue'
import { formatDateShort, formatNumber } from '@/utils'

import StarRating from '@/components/StarRating/StarRating.vue'

import bgImage10 from '@/assets/images/bg-image-10.jpg'
export default defineComponent({
  components: { StarRating },
  props: {
    course: Object,
    category: Object,
    instructor: Object,
    cert: Object
  },
  setup(props) {
    const avgStar = ref(props.course?.average_star || 5)

    const fmAvgStar = computed(() => formatNumber(avgStar.value, 1))

    return { avgStar, fmAvgStar, bgImage10 }
  },
  methods: {
    formatDateShort
  }
})
</script>

<style></style>
