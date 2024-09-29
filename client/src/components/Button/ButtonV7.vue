<template>
  <button class="button" @click.prevent="func">
    <span class="text-sm md:text-base">{{ content }}</span>
  </button>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    func: Function,
    content: String
  }
})
</script>

<style scoped>
.button {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 46px;
  min-width: 120px;
  padding: 0 20px;
  font-weight: 700;
  background-size: 300% 100%;
  border-radius: 6px;
  overflow: hidden;
  transition: all 0.4s ease-in-out;
  @apply text-primaryColor bg-primaryOpacityColor;
}

.button:hover {
  transform: translate3d(0, -1px, 0);
  box-shadow: 0px 15px 30px -2px rgba(0, 0, 0, 0.1);
  @apply text-whiteColor bg-primaryColor;
}
</style>
