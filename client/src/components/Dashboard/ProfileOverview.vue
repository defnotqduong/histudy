<template>
  <div class="relative">
    <div
      class="h-60 md:h-[360px] bg-cover bg-no-repeat bg-center rounded-xl overflow-hidden"
      :style="{ backgroundImage: userStore.user?.background_image ? `url(${userStore.user?.background_image})` : 'url(/src/assets/images/bg-image-23.jpg)' }"
    ></div>
    <div class="absolute bottom-8 w-full px-4 sm:px-8 md:px-12">
      <div class="flex flex-col gap-y-4 items-start md:flex-row md:items-end justify-start">
        <div class="flex-1 flex items-center justify-start">
          <div class="w-20 h-20 md:w-40 md:h-40 p-[2px] sm:p-1 mr-2 sm:mr-4 bg-whiteColor border-2 border-primaryOpacityColor rounded-full overflow-hidden">
            <img :src="userStore.user?.avatar" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
          </div>
          <div>
            <h5 class="mb-1 sm:mb-2 text-xl lg:text-2xl text-whiteColor font-extrabold">{{ userStore.user?.name }}</h5>
            <ul class="text-xs sm:text-base flex items-center justify-start gap-2 sm:gap-4">
              <li class="flex items-center justify-center gap-1 text-whiteColor">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.5 4.5C6.67157 4.5 6 5.17157 6 6V15.4013C6.44126 15.1461 6.95357 15 7.5 15H18V4.5H7.5ZM18 16.5H7.5C6.67157 16.5 6 17.1716 6 18C6 18.8284 6.67157 19.5 7.5 19.5H18V16.5ZM4.5 18L4.5 6C4.5 4.34315 5.84315 3 7.5 3H18.75L19.5 3.75V21H7.5C5.84315 21 4.5 19.6569 4.5 18Z"
                    fill="currentColor"
                  />
                </svg>
                {{ userStore.enrolledCourses.length }} Enr. Courses
              </li>
              <li class="flex items-center justify-center gap-1 text-whiteColor">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
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
                {{ userStore.certs.length }} Cert.
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores'
import ButtonV6 from '@/components/Button/ButtonV6.vue'
export default defineComponent({
  components: { ButtonV6 },
  setup() {
    const userStore = useUserStore()
    const router = useRouter()

    return {
      userStore
    }
  }
})
</script>

<style></style>
