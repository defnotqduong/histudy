<template>
  <button
    class="relative w-9 h-9 flex items-center justify-center group after:absolute after:content after:left-0 after:top-0 after:w-full after:h-full after:opacity-0 after:rounded-full after:scale-[0.8] after:bg-grayLightColor after:transition-all after:duration-[400ms] hover:after:scale-[1.2] hover:after:opacity-100"
    @click.prevent="func"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="none"
      class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1] w-5 h-5 transition-all duration-[400ms] group-hover:text-primaryColor"
      :class="`text-${color}`"
    >
      <g>
        <path
          id="Vector"
          d="M18 18L12 12M12 12L6 6M12 12L18 6M12 12L6 18"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </g>
    </svg>
  </button>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    func: Function,
    color: String
  }
})
</script>

<style scoped></style>
