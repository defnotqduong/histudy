<template>
  <button class="button" @click.prevent="func">
    <span
      class="relative text-sm md:text-base whitespace-nowrap after:absolute after:content-[attr(data-text)] after:top-1/2 after:left-full after:transform after:translate-x-full after:-translate-y-1/2 after:whitespace-nowrap"
      :data-text="content"
      >{{ content }}</span
    >
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
  @apply bg-primaryColor;
}

.button span {
  transition: transform 0.85s;
  transition-timing-function: cubic-bezier(0.15, 0.85, 0.31, 1);
}

.button:hover span {
  transform: translateX(-200%);
  @apply text-whiteColor;
}
</style>
