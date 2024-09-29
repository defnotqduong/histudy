<template>
  <main class="relative">
    <router-view></router-view>
    <BackToTopButton />
  </main>
</template>

<script>
import { defineComponent } from 'vue'
import BackToTopButton from '@/components/Button/BackToTopButton.vue'
export default defineComponent({
  components: { BackToTopButton }
})
</script>

<style></style>
