<template>
  <div class="card">
    <div class="flex items-center">
      <div>
        <router-link :to="{ name: 'home' }">
          <img src="../../assets/images/blog-card-02.jpg" class="h-full max-w-[260px] max-h-[290px] object-cover object-center" alt="Blog thumb" />
        </router-link>
      </div>
      <div class="p-7">
        <h3 class="mb-2 text-2xl font-black text-headingColor leading-tight line-clamp-2 transition-all duration-300 hover:text-primaryColor">
          <router-link :to="{ name: 'home' }">Why Is Education So Famous?</router-link>
        </h3>
        <ButtonV1 :content="'Read Article'" :link="'home'" />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import ButtonV1 from '@/components/Button/ButtonV1.vue'
export default defineComponent({
  props: {
    blog: Object
  },
  components: { ButtonV1 }
})
</script>

<style scoped>
.card {
  transition: all 256ms ease-in-out;
  @apply bg-whiteColor rounded shadow-shadow01 overflow-hidden;
}

.card:hover {
  transform: scale(1.02);
}
</style>
