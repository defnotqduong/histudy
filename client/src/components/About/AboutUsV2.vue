<template>
  <section class="py-24 bg-gradient01">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-12 md:col-span-6 flex flex-col">
          <div class="mr-0 md:mr-8 relative">
            <img src="@/assets/images/video-02.jpg" class="w-full max-h-[420px] object-cover object-center rounded-lg" alt="Video" />
            <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
              <PlayVideoButton />
            </div>
          </div>
        </div>
        <div class="col-span-12 md:col-span-6 flex flex-col items-start">
          <span class="inline-block px-5 py-2 mb-5 text-xs md:text-sm text-whiteColor font-bold uppercase bg-whiteOpacityColor rounded-full"
            >About Histudy</span
          >
          <h2 class="text-2xl md:text-3xl lg:text-[40px] lg:leading-tight font-black text-whiteColor">What is Histudy For You?.</h2>
          <p class="mt-5 mb-8 text-whiteColor">
            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in
            Bookmarksgrove right at the coast of the Semantics, a large language ocean.
          </p>
          <GradientButtonV3 :content="'More About Us'" :link="'home'" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import GradientButtonV3 from '@/components/Button/GradientButtonV3.vue'
import PlayVideoButton from '@/components/Button/PlayVideoButton.vue'
export default defineComponent({
  components: { GradientButtonV3, PlayVideoButton }
})
</script>

<style></style>
