<template>
  <div class="relative">
    <div class="h-[350px] bg-cover bg-no-repeat bg-center rounded-xl overflow-hidden" :style="{ backgroundImage: 'url(/src/assets/images/bg-image-23.jpg)' }"></div>
    <div class="absolute bottom-8 w-full px-12">
      <div class="flex items-center justify-start">
        <div class="w-[120px] h-[120px] p-1 mr-5 bg-whiteColor border-2 border-primaryOpacityColor rounded-full overflow-hidden">
          <img src="@/assets/images/avatar-02.jpg" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
        </div>
        <div>
          <h5 class="mb-2 text-xl text-whiteColor font-extrabold">Emily Hannah</h5>
          <ul class="flex items-center justify-start gap-4">
            <li class="flex items-center justify-center gap-1 text-whiteColor">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M7.5 4.5C6.67157 4.5 6 5.17157 6 6V15.4013C6.44126 15.1461 6.95357 15 7.5 15H18V4.5H7.5ZM18 16.5H7.5C6.67157 16.5 6 17.1716 6 18C6 18.8284 6.67157 19.5 7.5 19.5H18V16.5ZM4.5 18L4.5 6C4.5 4.34315 5.84315 3 7.5 3H18.75L19.5 3.75V21H7.5C5.84315 21 4.5 19.6569 4.5 18Z"
                  fill="currentColor"
                />
              </svg>
              5 Courses Enroled
            </li>
            <li class="flex items-center justify-center gap-1 text-whiteColor">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="7" />
                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
              </svg>
              4 Certificate
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({})
</script>

<style></style>
