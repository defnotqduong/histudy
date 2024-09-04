<template>
  <div class="p-7 bg-whiteColor rounded-md shadow-shadow01">
    <div><h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">Dashboard</h4></div>
    <div class="grid grid-cols-12 gap-4 md:gap-6">
      <div class="col-span-12 sm:col-span-6 lg:col-span-4 transition-all duration-300 hover:-translate-y-1">
        <div class="h-full p-7 bg-primaryOpacityColor border-2 border-borderColor border-dashed shadow-shadow01 rounded-md">
          <div
            class="w-20 h-20 sm:w-24 sm:h-24 p-6 mb-5 mx-auto flex items-center justify-center shadow-shadow02 rounded-full bg-primaryOpacityColor text-primaryColor"
          >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="24" height="24">
              <path
                d="M12 10.4V20M12 10.4C12 8.15979 12 7.03969 11.564 6.18404C11.1805 5.43139 10.5686 4.81947 9.81596 4.43597C8.96031 4 7.84021 4 5.6 4H4.6C4.03995 4 3.75992 4 3.54601 4.10899C3.35785 4.20487 3.20487 4.35785 3.10899 4.54601C3 4.75992 3 5.03995 3 5.6V16.4C3 16.9601 3 17.2401 3.10899 17.454C3.20487 17.6422 3.35785 17.7951 3.54601 17.891C3.75992 18 4.03995 18 4.6 18H7.54668C8.08687 18 8.35696 18 8.61814 18.0466C8.84995 18.0879 9.0761 18.1563 9.29191 18.2506C9.53504 18.3567 9.75977 18.5065 10.2092 18.8062L12 20M12 10.4C12 8.15979 12 7.03969 12.436 6.18404C12.8195 5.43139 13.4314 4.81947 14.184 4.43597C15.0397 4 16.1598 4 18.4 4H19.4C19.9601 4 20.2401 4 20.454 4.10899C20.6422 4.20487 20.7951 4.35785 20.891 4.54601C21 4.75992 21 5.03995 21 5.6V16.4C21 16.9601 21 17.2401 20.891 17.454C20.7951 17.6422 20.6422 17.7951 20.454 17.891C20.2401 18 19.9601 18 19.4 18H16.4533C15.9131 18 15.643 18 15.3819 18.0466C15.15 18.0879 14.9239 18.1563 14.7081 18.2506C14.465 18.3567 14.2402 18.5065 13.7908 18.8062L12 20"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
          <div class="flex flex-col items-center justify-center">
            <h3 class="mb-3 text-3xl sm:text-5xl text-primaryColor font-extrabold">{{ userStore.enrolledCourses.length }}</h3>
            <span class="text-center text-sm text-primaryColor font-bold opacity-60 uppercase">ENROLLED COURSES</span>
          </div>
        </div>
      </div>
      <div class="col-span-12 sm:col-span-6 lg:col-span-4 transition-all duration-300 hover:-translate-y-1">
        <div class="h-full p-7 bg-secondaryOpacityColor border-2 border-borderColor border-dashed shadow-shadow01 rounded-md">
          <div
            class="w-20 h-20 sm:w-24 sm:h-24 p-6 mb-5 mx-auto flex items-center justify-center shadow-shadow02 rounded-full bg-secondaryOpacityColor text-secondaryColor"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path
                d="M12 17V21M8 21H16M6.2 17H17.8C18.9201 17 19.4802 17 19.908 16.782C20.2843 16.5903 20.5903 16.2843 20.782 15.908C21 15.4802 21 14.9201 21 13.8V6.2C21 5.0799 21 4.51984 20.782 4.09202C20.5903 3.71569 20.2843 3.40973 19.908 3.21799C19.4802 3 18.9201 3 17.8 3H6.2C5.0799 3 4.51984 3 4.09202 3.21799C3.71569 3.40973 3.40973 3.71569 3.21799 4.09202C3 4.51984 3 5.07989 3 6.2V13.8C3 14.9201 3 15.4802 3.21799 15.908C3.40973 16.2843 3.71569 16.5903 4.09202 16.782C4.51984 17 5.07989 17 6.2 17Z"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
              />
            </svg>
          </div>
          <div class="flex flex-col items-center justify-center">
            <h3 class="mb-3 text-3xl sm:text-5xl text-secondaryColor font-extrabold">10</h3>
            <span class="text-center text-sm text-secondaryColor font-bold opacity-60 uppercase">ACTIVE COURSES</span>
          </div>
        </div>
      </div>
      <div class="col-span-12 sm:col-span-6 lg:col-span-4 transition-all duration-300 hover:-translate-y-1">
        <div class="h-full p-7 bg-violetOpacityColor border-2 border-borderColor border-dashed shadow-shadow01 rounded-md">
          <div
            class="w-20 h-20 sm:w-24 sm:h-24 p-6 mb-5 mx-auto flex items-center justify-center shadow-shadow02 rounded-full bg-violetOpacityColor text-violetColor"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
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
          </div>
          <div class="flex flex-col items-center justify-center">
            <h3 class="mb-3 text-3xl sm:text-5xl text-violetColor font-extrabold">7</h3>
            <span class="text-center text-sm text-violetColor font-bold opacity-60 uppercase">COMPLETED COURSES</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useUserStore } from '@/stores'
export default defineComponent({
  setup() {
    const userStore = useUserStore()

    return {
      userStore
    }
  },
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 0 })
    }
  },
  created() {
    this.scrollToTop()
  }
})
</script>

<style></style>
