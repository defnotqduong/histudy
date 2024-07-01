<template>
  <div class="course-card">
    <div>
      <router-link :to="{ name: 'course-details', params: { slug: 1 } }">
        <img src="../../assets/images/course-01.jpg" class="w-full h-auto object-cover object-center rounded-md" alt="Course Thumbnail" />
      </router-link>
    </div>
    <div class="pt-4 px-1 pb-2">
      <h5 class="mb-2 text-headingColor text-base font-extrabold leading-5 line-clamp-3">
        <router-link :to="{ name: 'course-details', params: { slug: 1 } }" class="hover:text-primaryColor transition-all duration-300"
          >The Complete Histudy 2024: From Zero to Expert!</router-link
        >
      </h5>
      <div class="mb-2 flex items-center">
        <div class="flex items-center gap-[1px]">
          <span v-for="i in 5" :key="i"
            ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#FFC52F" viewBox="0 0 37.286 37.287" class="w-3 h-3">
              <g>
                <path
                  d="M36.683,16.339l-7.567,7.377l1.786,10.417c0.128,0.75-0.182,1.509-0.797,1.957c-0.348,0.253-0.762,0.382-1.176,0.382   c-0.318,0-0.638-0.076-0.931-0.23l-9.355-4.918l-9.355,4.918c-0.674,0.355-1.49,0.295-2.107-0.15   c-0.615-0.448-0.924-1.206-0.795-1.957l1.787-10.417L0.604,16.34c-0.547-0.531-0.741-1.326-0.508-2.05   c0.236-0.724,0.861-1.251,1.615-1.361l10.459-1.521l4.68-9.478c0.335-0.684,1.031-1.116,1.792-1.116   c0.763,0,1.456,0.432,1.793,1.115l4.68,9.478l10.461,1.521c0.752,0.109,1.379,0.637,1.611,1.361   C37.425,15.013,37.226,15.808,36.683,16.339z"
                />
              </g></svg
          ></span>
        </div>
        <span class="text-xs text-bodyColor ml-1">(15 Reviews)</span>
      </div>
      <div class="flex items-center">
        <span class="text-sm text-bodyColor font-extrabold">$15</span>
        <span class="ml-[6px] text-sm text-bodyColor font-bold opacity-40 line-through">$25</span>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {}
})
</script>

<style scoped>
.course-card {
  padding: 10px;
  border-radius: 6px;
  box-shadow: 0px 6px 34px rgba(215, 216, 222, 0.4);
  transition: all 0.2s ease-in-out;
  @apply bg-whiteColor;
}

.course-card:hover {
  transform: translate3d(0, -2px, 0);
  /* transform: scale(1.01); */
}
</style>
