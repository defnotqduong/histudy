<template>
  <div class="flex items-start justify-start">
    <div class="mr-8">
      <a href="">
        <img src="@/assets/images/user-02.jpg" class="max-h-[105px] max-w-[105px] object-cover object-center rounded-md" alt="Student Avt" />
      </a>
    </div>
    <div>
      <h5 class="text-headingColor text-xl font-extrabold transition-all duration-300 hover:text-primaryColor"><a href="">Claudia Pruitt</a></h5>
      <div class="mt-2 mb-3 flex items-center justify-start">
        <span v-for="i in 5" :key="i"
          ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor">
            <path
              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
            ></path></svg
        ></span>
      </div>
      <p class="text-lg text-bodyColor">My favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top.</p>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({})
</script>

<style></style>
