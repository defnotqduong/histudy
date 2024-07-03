<template>
  <div class="relative min-h-[500px] pt-[60px] pb-[80px] bg-cover bg-center" style="background-image: url('/src/assets/images/bg-image-10.jpg')">
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
          <p class="mb-5 text-lg text-headingColor">
            Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!
          </p>
          <div class="mb-5 flex items-center justify-start gap-4">
            <div
              class="px-5 h-12 flex items-center justify-center gap-2 text-sm text-headingColor font-bold bg-badgeColor shadow-shadow04 rounded-full border-[1px] border-whiteColor"
            >
              <span><img src="@/assets/images/card-icon-01.jpg" class="w-[30px] h-[30px] object-cover object-center" alt="Seller" /></span>
              BestSeller
            </div>
            <div class="flex items-center gap-[1px]">
              <span class="text-sm text-headingColor font-bold mr-2 mt-1">4.8</span>
              <span v-for="i in 5" :key="i"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  fill="#FFC52F"
                  viewBox="0 0 37.286 37.287"
                  class="w-[14px] h-[14px]"
                >
                  <g>
                    <path
                      d="M36.683,16.339l-7.567,7.377l1.786,10.417c0.128,0.75-0.182,1.509-0.797,1.957c-0.348,0.253-0.762,0.382-1.176,0.382   c-0.318,0-0.638-0.076-0.931-0.23l-9.355-4.918l-9.355,4.918c-0.674,0.355-1.49,0.295-2.107-0.15   c-0.615-0.448-0.924-1.206-0.795-1.957l1.787-10.417L0.604,16.34c-0.547-0.531-0.741-1.326-0.508-2.05   c0.236-0.724,0.861-1.251,1.615-1.361l10.459-1.521l4.68-9.478c0.335-0.684,1.031-1.116,1.792-1.116   c0.763,0,1.456,0.432,1.793,1.115l4.68,9.478l10.461,1.521c0.752,0.109,1.379,0.637,1.611,1.361   C37.425,15.013,37.226,15.808,36.683,16.339z"
                    />
                  </g></svg
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
              <router-link :to="{ name: 'home' }" class="text-headingColor font-bold transition-all duration-300 hover:text-primaryColor"
                >Claudia Arm</router-link
              >
              In
              <router-link :to="{ name: 'home' }" class="text-headingColor font-bold transition-all duration-300 hover:text-primaryColor"
                >Designing</router-link
              >
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
                <path d="M2.62964 8.5H21.3704" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg
              ><span>English</span>
            </li>
            <li>Certified Course</li>
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
