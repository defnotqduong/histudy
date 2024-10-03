<template>
  <section class="py-24">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-6">
          <div>
            <img src="../../assets/images/about-01.jpg" class="w-full h-auto object-cover object-center" alt="About us" />
          </div>
        </div>
        <div class="col-span-6 flex flex-col items-start">
          <span class="inline-block px-5 py-2 mb-5 text-sm text-primaryColor font-bold uppercase bg-primaryOpacityColor rounded-full">About Histudy</span>
          <h2 class="text-[40px] font-black text-headingColor leading-tight">What is Histudy For You?.</h2>
          <p class="mt-5 mb-8">
            <strong> Histudy educational platform</strong> ipsum dolor sit amet consectetur adipisicing elit. Nam inventore praesentium alias incidunt!
            Veritatis, necessitatibus fuga dolore tenetur, beatae suscipit fugit est ea perspiciatis quo provident nisi dolor similique architecto nihil.
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
export default defineComponent({
  components: { GradientButtonV3 }
})
</script>

<style></style>
