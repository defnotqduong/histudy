<template>
  <div class="fixed bottom-7 right-7 z-[9000] btt-wrapper" :class="{ active: isScroll }">
    <button class="button" @click="scrollToTop" role="button" title="Scroll To Top">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4 text-primaryColor absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M12 3C12.2652 3 12.5196 3.10536 12.7071 3.29289L19.7071 10.2929C20.0976 10.6834 20.0976 11.3166 19.7071 11.7071C19.3166 12.0976 18.6834 12.0976 18.2929 11.7071L13 6.41421V20C13 20.5523 12.5523 21 12 21C11.4477 21 11 20.5523 11 20V6.41421L5.70711 11.7071C5.31658 12.0976 4.68342 12.0976 4.29289 11.7071C3.90237 11.3166 3.90237 10.6834 4.29289 10.2929L11.2929 3.29289C11.4804 3.10536 11.7348 3 12 3Z"
          fill="currentColor"
        />
      </svg>
      <svg class="w-full h-full text-primaryColor" viewBox="-1 -1 102 102">
        <path
          d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
          :style="{ transition: 'stroke-dashoffset 10ms linear 0s', 'stroke-dasharray': '307.919', 'stroke-dashoffset': pos }"
          fill="none"
          stroke="currentColor"
          stroke-width="3"
        ></path>
      </svg>
    </button>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
export default defineComponent({
  setup() {
    const isScroll = ref(false)
    const pos = ref(0)

    const handleScroll = () => {
      if (window.scrollY > 320) {
        isScroll.value = true
      } else {
        isScroll.value = false
      }

      let position = document.documentElement.scrollTop
      let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight

      pos.value = Math.round(((calcHeight - position) / calcHeight) * 307.919)
    }

    return {
      isScroll,
      pos,
      handleScroll
    }
  },
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' })
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll)
  },
  unmounted() {
    window.removeEventListener('scroll', this.handleScroll)
  }
})
</script>

<style scoped>
.btt-wrapper {
  opacity: 0;
  visibility: hidden;
  transform: translateY(16px);
  transition: all 0.25s linear;
}

.btt-wrapper.active {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.button {
  position: relative;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition-duration: 0.3s;
  overflow: hidden;
  position: relative;
  box-shadow: inset 0 0 0 2px rgba(0, 0, 0, 0.04);
  @apply text-primaryColor;
}
</style>
