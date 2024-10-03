<template>
  <div class="mt-4 md:mt-8 p-4 md:p-6 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
    <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-[1px] border-borderColor">Instructor</h4>
    <div class="flex flex-col items-center justify-center gap-y-6 md:flex-row md:items-start md:justify-start">
      <div class="mr-0 md:mr-8">
        <div>
          <img :src="instructor?.info?.avatar" class="max-w-[250px] max-h-[250px] object-cover object-center rounded-full" alt="Instructor" />
        </div>
      </div>
      <div>
        <div>
          <h5 class="text-headingColor text-xl font-extrabold transition-all duration-300 hover:text-primaryColor">
            {{ instructor?.info?.name }}
          </h5>
          <span class="block mt-2">{{ instructor?.info?.profession }}</span>
          <ul class="mt-3 mb-6 flex flex-wrap items-center justify-start gap-x-1 gap-y-2">
            <li>
              <span class="py-1 px-2 flex items-center justify-center gap-1 text-sm leading-none rounded-md bg-grayLightColor"
                ><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor mb-[2px]">
                  <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                  ></path>
                </svg>
                {{ instructor?.total_reviews || 0 }} Reviews</span
              >
            </li>
            <li>
              <span class="py-1 px-2 flex items-center justify-center gap-1 text-sm leading-none rounded-md bg-grayLightColor">{{ fmAvgStar }} Rating</span>
            </li>
            <li>
              <span class="ml-2 py-1 px-2 flex items-center justify-center gap-1 text-sm leading-none rounded-md bg-grayLightColor">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
                  <path
                    d="M19 15C21.2091 15 23 16.7909 23 19V21H21M16 10.874C17.7252 10.4299 19 8.86383 19 6.99999C19 5.13615 17.7252 3.57005 16 3.12601M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7ZM5 15H13C15.2091 15 17 16.7909 17 19V21H1V19C1 16.7909 2.79086 15 5 15Z"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
                {{ instructor?.total_customers || 0 }} Students</span
              >
            </li>
            <li>
              <span class="py-1 px-2 flex items-center justify-center gap-1 text-sm text-headingColor leading-none rounded-md bg-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
                  <path
                    d="M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.07989 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
                {{ instructor?.published_courses_count }} Courses</span
              >
            </li>
          </ul>
          <p class="text-lg">{{ instructor?.info?.bio }}</p>
          <SocialListV2 class="mt-3" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from 'vue'
import { formatNumber } from '@/utils'

import SocialListV2 from '@/components/SocialList/SocialListV2.vue'
export default defineComponent({
  components: {
    SocialListV2
  },
  props: {
    instructor: Object
  },
  setup(props) {
    const avgStar = ref(props.instructor?.average_rating || 5)

    const fmAvgStar = computed(() => formatNumber(avgStar.value, 1))

    return {
      avgStar,
      fmAvgStar
    }
  }
})
</script>

<style></style>
