<template>
  <div>
    <div class="relative">
      <img :src="cert.cert_url" alt="certificate" />
    </div>
    <div class="mt-6 flex items-center justify-center gap-4">
      <button
        class="px-6 h-10 bg-whiteColor text-primaryColor font-bold border-[2px] border-primaryColor rounded-full transition-all duration-300 hover:text-whiteColor hover:bg-primaryColor hover:translate-y-[-2px]"
      >
        Download
      </button>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'

export default defineComponent({
  components: {},
  props: {
    cert: Object
  },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()

    return {}
  }
})
</script>

<style scoped>
.caret {
  opacity: 1;
  transform: rotate(-8deg);
  transition: opacity 0.3s ease;
}

.custom-blink {
  animation: flash 0.6s infinite;
}

@keyframes flash {
  0%,
  100% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
}
</style>
