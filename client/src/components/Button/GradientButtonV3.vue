<template>
  <button class="button">
    <router-link :to="{ name: link }" class="w-full h-full flex items-center justify-center">
      <span
        class="relative after:absolute after:content-[attr(data-text)] after:top-1/2 after:left-full after:transform after:translate-x-full after:-translate-y-1/2 after:whitespace-nowrap"
        :data-text="content"
        >{{ content }}</span
      >
    </router-link>
  </button>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    content: String,
    link: String
  }
})
</script>

<style scoped>
.button {
  height: 48px;
  padding: 0 28px;
  font-size: 16px;
  font-weight: 700;
  background-size: 300% 100%;
  border-radius: 9999px;
  overflow: hidden;
  transition: all 0.4s ease-in-out;
  @apply text-white bg-gradient03;
}

.button:hover {
  transform: translate3d(0, -1px, 0);
  box-shadow: 0px 15px 30px -2px rgba(0, 0, 0, 0.1);
  background-position: 102% 0;
}

.button:hover span {
  animation: btnTxtMarqueeX 2s linear infinite;
}

@keyframes btnTxtMarqueeX {
  100% {
    transform: translateX(-200%);
  }
}
</style>
