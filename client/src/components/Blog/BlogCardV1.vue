<template>
  <div class="card">
    <div>
      <router-link :to="{ name: 'home' }">
        <img src="@/assets/images/blog-card-01.jpg" class="w-full object-cover object-center" alt="Blog thumb" />
      </router-link>
    </div>
    <div class="p-7">
      <h3 class="mb-2 text-xl lg:text-2xl font-black text-headingColor leading-tight line-clamp-2 transition-all duration-300 hover:text-primaryColor">
        <router-link :to="{ name: 'home' }"> How to Analyze Your Best Pages for SEO Performance </router-link>
      </h3>
      <p class="text-base font-medium line-clamp-4 mb-4">It is a long established fact that a reader.</p>
      <ButtonV1 :content="'Learn More'" :link="'home'" />
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import ButtonV1 from '@/components/Button/ButtonV1.vue'
export default defineComponent({
  props: {
    Blog: Object
  },
  components: {
    ButtonV1
  }
})
</script>

<style scoped>
.card {
  transition: all 256ms ease-in-out;
  @apply bg-whiteColor rounded-md shadow-shadow01 overflow-hidden;
}

.card:hover {
  transform: scale(1.02);
}
</style>
