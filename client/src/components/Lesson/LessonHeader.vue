<template>
  <div class="h-12 px-4 text-whiteColor bg-primaryColor">
    <div class="w-full h-full flex items-center justify-between">
      <div>
        <h3 class="text-lg font-bold">The Complete Histudy 2023: From Zero to Expert!</h3>
      </div>
      <div>
        <button
          @click="goBack"
          class="relative w-8 h-8 flex items-center justify-center group after:absolute after:content after:left-0 after:top-0 after:w-full after:h-full after:opacity-0 after:rounded-full after:scale-[0.8] after:bg-grayLightColor after:transition-all after:duration-[400ms] hover:after:scale-[1.2] hover:after:opacity-100"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1] w-5 h-5 text-whiteColor transition-all duration-[400ms] group-hover:text-primaryColor"
          >
            <g>
              <path id="Vector" d="M18 18L12 12M12 12L6 6M12 12L18 6M12 12L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </g>
          </svg>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  components: {},
  setup() {},
  methods: {
    goBack() {
      this.$router.go(-1)
    }
  }
})
</script>

<style></style>
