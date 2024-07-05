<template>
  <div class="course-card">
    <div>
      <router-link :to="{ name: 'course-details', params: { slug: 1 } }">
        <img src="@/assets/images/course-01.jpg" class="w-full h-auto object-cover object-center rounded-md" alt="Course Thumbnail" />
      </router-link>
    </div>
    <div class="pt-4 px-1 pb-2">
      <h5 class="mb-2 text-headingColor text-base font-extrabold leading-5 line-clamp-3">
        <router-link :to="{ name: 'course-details', params: { slug: 1 } }" class="hover:text-primaryColor transition-all duration-300">The Complete Histudy 2024: From Zero to Expert!</router-link>
      </h5>
      <div class="mb-2 flex items-center">
        <div class="flex items-center gap-[1px]">
          <span v-for="i in 5" :key="i"
            ><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor">
              <path
                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
              ></path></svg
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
