<template>
  <section class="py-24 bg-gradient09">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-center justify-center">
        <span class="inline-block px-5 py-2 mb-5 text-xs md:text-sm text-coralColor font-bold uppercase bg-coralOpacityColor rounded-full"
          >Education for everyone</span
        >
        <h2 class="text-center text-2xl md:text-3xl lg:text-[40px] lg:leading-tight font-black text-headingColor">
          People like histudy education. <br />Here's the evidence to back it up!
        </h2>
      </div>
      <div class="mt-16 overflow-hidden relative">
        <div class="scroll-right-left pb-6 flex items-center justify-start gap-6 w-[5000px]">
          <div v-for="i in 10" :key="i" class="feedback-card relative w-[360px] md:w-[460px] rounded-md p-6 md:p-10">
            <div class="flex items-center justify-start">
              <div class="w-16 h-16 p-[2px] border-2 bg-whiteColor border-primaryOpacityColor rounded-full">
                <img src="@/assets/images/user-01.jpg" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
              </div>
              <div class="pl-4">
                <h5 class="text-xl font-extrabold line-clamp-1">Michael D. Lovelady</h5>
                <span class="text-base font-medium prof">CEO <i>@ Google</i> </span>
              </div>
            </div>
            <div class="mt-5">
              <p class="text-base font-medium line-clamp-3">
                Histudy education, vulputate at sapien sit amet, auctor iaculis lorem. In vel hend rerit. Vestibulum eget risus velit.
              </p>
            </div>
            <span class="absolute top-6 right-6">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 32 32" class="w-8 h-8 sm:w-10 sm:h-10 md:w-14 md:h-14">
                <path
                  d="M9.563 8.469l-0.813-1.25c-5.625 3.781-8.75 8.375-8.75 12.156 0 3.656 2.688 5.375 4.969 5.375 2.875 0 4.906-2.438 4.906-5 0-2.156-1.375-4-3.219-4.688-0.531-0.188-1.031-0.344-1.031-1.25 0-1.156 0.844-2.875 3.938-5.344zM21.969 8.469l-0.813-1.25c-5.563 3.781-8.75 8.375-8.75 12.156 0 3.656 2.75 5.375 5.031 5.375 2.906 0 4.969-2.438 4.969-5 0-2.156-1.406-4-3.313-4.688-0.531-0.188-1-0.344-1-1.25 0-1.156 0.875-2.875 3.875-5.344z"
                />
              </svg>
            </span>
          </div>
        </div>
      </div>
      <div class="mt-6 overflow-hidden relative">
        <div class="scroll-left-right pb-6 flex items-center justify-start gap-6 w-[5000px]">
          <div v-for="i in 10" :key="i" class="feedback-card relative w-[360px] md:w-[460px] rounded-md p-6 md:p-10">
            <div class="flex items-center justify-start">
              <div class="w-16 h-16 p-[2px] border-2 bg-whiteColor border-primaryOpacityColor rounded-full">
                <img src="@/assets/images/user-01.jpg" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
              </div>
              <div class="pl-4">
                <h5 class="text-xl font-extrabold line-clamp-1">Michael D. Lovelady</h5>
                <span class="text-base font-medium prof">CEO <i>@ Google</i> </span>
              </div>
            </div>
            <div class="mt-5">
              <p class="text-base font-medium line-clamp-3">
                Histudy education, vulputate at sapien sit amet, auctor iaculis lorem. In vel hend rerit. Vestibulum eget risus velit.
              </p>
            </div>
            <span class="absolute top-6 right-6">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 32 32" class="w-8 h-8 sm:w-10 sm:h-10 md:w-14 md:h-14">
                <path
                  d="M9.563 8.469l-0.813-1.25c-5.625 3.781-8.75 8.375-8.75 12.156 0 3.656 2.688 5.375 4.969 5.375 2.875 0 4.906-2.438 4.906-5 0-2.156-1.375-4-3.219-4.688-0.531-0.188-1.031-0.344-1.031-1.25 0-1.156 0.844-2.875 3.938-5.344zM21.969 8.469l-0.813-1.25c-5.563 3.781-8.75 8.375-8.75 12.156 0 3.656 2.75 5.375 5.031 5.375 2.906 0 4.969-2.438 4.969-5 0-2.156-1.406-4-3.313-4.688-0.531-0.188-1-0.344-1-1.25 0-1.156 0.875-2.875 3.875-5.344z"
                />
              </svg>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({})
</script>

<style scoped>
.scroll-right-left {
  animation: scrollRight 80s linear infinite;
  animation-fill-mode: forwards;
}

.scroll-left-right {
  animation: scrollLeft 80s linear infinite;
  animation-fill-mode: forwards;
}

.feedback-card:nth-child(odd) {
  @apply text-whiteColor bg-gradient08;
}

.feedback-card:nth-child(odd) .prof {
  @apply text-whiteOffColor;
}

.feedback-card:nth-child(even) {
  @apply text-headingColor bg-whiteColor shadow-shadow01;
}

.feedback-card:nth-child(even) .prof {
  @apply text-bodyColor;
}

@keyframes scrollRight {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-1750px);
  }
}

@keyframes scrollLeft {
  0% {
    transform: translateX(-1750px);
  }
  100% {
    transform: translateX(0);
  }
}
</style>
