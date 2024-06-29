<template>
  <section class="py-24">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-12">
        <div class="col-span-6 flex flex-col items-start">
          <span class="inline-block px-5 py-2 mb-5 text-sm text-secondaryColor font-bold uppercase bg-secondaryOpacityColor rounded-full">Blog Post</span>
          <h2 class="text-center text-[40px] font-black text-headingColor leading-tight">Histudy News</h2>
        </div>
        <div class="col-span-6 flex items-end justify-end">
          <ButtonV4 :content="'View All Articles'" :link="'home'" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import ButtonV4 from '@/components/Button/ButtonV4.vue'
export default defineComponent({
  components: { ButtonV4 }
})
</script>

<style></style>
