<template>
  <div class="relative min-h-[500px] pt-[60px] pb-[80px] bg-cover bg-center" :style="{ backgroundImage: 'url(/src/assets/images/bg-image-10.jpg)' }">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12">
        <div class="col-span-8 pr-[16%]">
          <div class="breadcrumbs text-sm text-headingColor">
            <ul>
              <li class="hover:text-primaryColor transition-all duration-300"><router-link :to="{ name: 'home' }">Home</router-link></li>
              <li class="opacity-60">Web Design</li>
            </ul>
          </div>
          <div class="my-6 flex items-center justify-start">
            <h1 class="text-5xl text-headingColor font-black">The Complete Histudy 2024: From Zero to Expert!</h1>
          </div>
          <p class="mb-5 text-lg text-headingColor">Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!</p>
          <div class="mb-5 flex items-center justify-start gap-4">
            <div class="px-5 h-12 flex items-center justify-center gap-2 text-sm text-headingColor font-bold bg-badgeColor shadow-shadow04 rounded-full border-[1px] border-whiteColor">
              <span><img src="@/assets/images/card-icon-01.jpg" class="w-[30px] h-[30px] object-cover object-center" alt="Seller" /></span>
              BestSeller
            </div>
            <div class="flex items-center gap-[1px]">
              <span class="text-sm text-headingColor font-bold mr-2 mt-1">4.8</span>
              <span v-for="i in 5" :key="i"
                ><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor">
                  <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                  ></path></svg
              ></span>
            </div>
            <div><span class="text-sm font-bold text-headingColor">215,475 rating</span></div>
            <div><span class="text-sm font-bold text-headingColor">616,029 students</span></div>
          </div>
          <div class="mb-4 flex items-center justify-start">
            <div class="w-10 h-10 p-[2px] border-2 border-primaryOpacityColor rounded-full mr-2">
              <img src="@/assets/images/user-01.jpg" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
            </div>
            <div class="text-sm font-medium">
              By
              <router-link :to="{ name: 'home' }" class="text-headingColor font-bold transition-all duration-300 hover:text-primaryColor">Claudia Arm</router-link>
              In
              <router-link :to="{ name: 'home' }" class="text-headingColor font-bold transition-all duration-300 hover:text-primaryColor">Designing</router-link>
            </div>
          </div>
          <ul class="text-sm text-headingColor font-medium flex items-center justify-start gap-4">
            <li class="flex items-center justify-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[14px] h-[14px]">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M6 2C6 1.44772 6.44772 1 7 1C7.55228 1 8 1.44772 8 2V3H16V2C16 1.44772 16.4477 1 17 1C17.5523 1 18 1.44772 18 2V3H19C20.6569 3 22 4.34315 22 6V20C22 21.6569 20.6569 23 19 23H5C3.34315 23 2 21.6569 2 20V6C2 4.34315 3.34315 3 5 3H6V2ZM16 5V6C16 6.55228 16.4477 7 17 7C17.5523 7 18 6.55228 18 6V5H19C19.5523 5 20 5.44772 20 6V9H4V6C4 5.44772 4.44772 5 5 5H6V6C6 6.55228 6.44772 7 7 7C7.55228 7 8 6.55228 8 6V5H16ZM4 11V20C4 20.5523 4.44772 21 5 21H19C19.5523 21 20 20.5523 20 20V11H4Z"
                  fill="currentColor"
                /></svg
              ><span>Last updated 12/2024</span>
            </li>
            <li class="flex items-center justify-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[14px] h-[14px]">
                <path
                  d="M2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12Z"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path d="M13 2.04932C13 2.04932 16 5.99994 16 11.9999C16 17.9999 13 21.9506 13 21.9506" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M11 21.9506C11 21.9506 8 17.9999 8 11.9999C8 5.99994 11 2.04932 11 2.04932" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2.62964 15.5H21.3704" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2.62964 8.5H21.3704" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg
              ><span>English</span>
            </li>
            <li class="flex items-center justify-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 32 32">
                <path
                  d="M 16 3 C 15.375 3 14.753906 3.210938 14.21875 3.59375 L 12.5625 4.75 L 10.65625 5 L 10.625 5 L 10.59375 5.03125 C 9.320313 5.316406 8.316406 6.320313 8.03125 7.59375 L 8 7.625 L 8 7.65625 L 7.75 9.59375 L 6.59375 11.09375 L 6.5625 11.125 L 6.5625 11.15625 C 5.863281 12.273438 5.832031 13.714844 6.59375 14.78125 L 7.78125 16.4375 L 8.09375 18.15625 L 4.875 23.0625 L 3.84375 24.59375 L 8.625 24.59375 L 9.78125 27.28125 L 10.5 29 L 11.53125 27.4375 L 14.6875 22.6875 C 15.535156 23.035156 16.492188 23.066406 17.3125 22.6875 L 20.46875 27.4375 L 21.5 29 L 22.21875 27.28125 L 23.375 24.59375 L 28.15625 24.59375 L 27.125 23.0625 L 24 18.3125 L 24.25 16.4375 L 25.40625 14.78125 L 25.4375 14.75 L 25.4375 14.71875 C 26.136719 13.601563 26.167969 12.191406 25.40625 11.125 L 24.25 9.46875 L 23.875 7.59375 L 23.90625 7.59375 C 23.902344 7.570313 23.878906 7.554688 23.875 7.53125 C 23.695313 6.222656 22.660156 5.160156 21.34375 5 L 21.3125 5 L 19.4375 4.75 L 17.78125 3.59375 C 17.246094 3.210938 16.625 3 16 3 Z M 16 5.03125 C 16.230469 5.03125 16.457031 5.101563 16.625 5.21875 L 18.40625 6.5 L 18.625 6.65625 L 18.875 6.6875 L 21.0625 7 L 21.09375 7 C 21.542969 7.050781 21.855469 7.363281 21.90625 7.8125 L 21.90625 7.875 L 22.3125 10.09375 L 22.34375 10.3125 L 22.5 10.5 L 23.78125 12.28125 C 24.019531 12.613281 24.050781 13.175781 23.75 13.65625 L 22.34375 15.625 L 22.3125 15.875 L 22 18.0625 L 22 18.09375 C 21.980469 18.257813 21.925781 18.410156 21.84375 18.53125 L 21.78125 18.5625 L 21.78125 18.59375 C 21.636719 18.765625 21.4375 18.878906 21.1875 18.90625 L 21.125 18.90625 L 18.84375 19.3125 L 18.59375 19.34375 L 18.40625 19.5 L 16.625 20.78125 C 16.292969 21.019531 15.699219 21.050781 15.21875 20.75 L 13.59375 19.5 L 13.40625 19.34375 L 13.125 19.3125 L 10.9375 19 L 10.90625 19 C 10.597656 18.964844 10.359375 18.804688 10.21875 18.5625 C 10.15625 18.453125 10.109375 18.324219 10.09375 18.1875 L 10.09375 18.125 L 9.6875 15.84375 L 9.65625 15.59375 L 9.5 15.40625 L 8.21875 13.625 C 7.980469 13.292969 7.949219 12.699219 8.25 12.21875 L 9.5 10.59375 L 9.65625 10.40625 L 9.6875 10.125 L 9.96875 8.03125 C 9.972656 8.015625 9.996094 8.015625 10 8 C 10.125 7.511719 10.511719 7.125 11 7 C 11.015625 6.996094 11.015625 6.972656 11.03125 6.96875 L 13.125 6.6875 L 13.375 6.65625 L 13.59375 6.5 L 15.375 5.21875 C 15.542969 5.101563 15.769531 5.03125 16 5.03125 Z M 22.90625 20.25 L 24.4375 22.59375 L 22.03125 22.59375 L 21.78125 23.21875 L 21.09375 24.8125 L 18.96875 21.5625 L 19.4375 21.21875 L 21.40625 20.875 L 21.40625 20.90625 C 21.429688 20.902344 21.445313 20.878906 21.46875 20.875 C 22.007813 20.800781 22.496094 20.574219 22.90625 20.25 Z M 9.09375 20.28125 C 9.519531 20.664063 10.0625 20.929688 10.65625 21 C 10.667969 21 10.675781 21 10.6875 21 L 12.59375 21.25 L 13.03125 21.59375 L 10.90625 24.8125 L 10.21875 23.21875 L 9.96875 22.59375 L 7.5625 22.59375 Z"
                /></svg
              ><span>Certified Course</span>
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
