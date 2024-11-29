<template>
  <div>
    <div class="relative" ref="certContent">
      <label for="name" class="absolute top-1/2 left-0 -translate-y-1/2 w-full h-10 mt-2">
        <input
          class="absolute top-0 left-1/2 -translate-x-1/2 w-1/2 h-full opacity-0"
          type="text"
          name="name"
          id="name"
          v-model="name"
          @focus="isFocused = true"
          @blur="isFocused = false"
        />
        <div class="text-center text-4xl text-thirtyColor" style="font-family: 'GreatVibes', cursive">
          {{ name }}
          <span v-if="name === '' || isFocused" class="caret" :class="{ 'animate__animated custom-blink': isFocused }"> | </span>
        </div>
      </label>
      <img :src="cert?.template_url" class="w-full object-contain object-center" alt="Certificate" />
    </div>
    <div class="mt-6 flex items-center justify-center gap-4">
      <button
        @click="save"
        class="px-6 h-10 bg-primaryOpacityColor text-primaryColor font-bold rounded-full transition-all duration-300 hover:bg-primaryColor hover:text-whiteColor hover:translate-y-[-2px]"
      >
        Save
      </button>
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
import html2canvas from 'html2canvas'

import 'vue-pdf-embed/dist/styles/annotationLayer.css'
import 'vue-pdf-embed/dist/styles/textLayer.css'

export default defineComponent({
  components: {},
  props: {
    cert: Object
  },
  setup() {
    const router = useRouter()
    const homeStore = useHomeStore()

    const certContent = ref(null)
    const name = ref('')
    const isFocused = ref(false)

    const save = () => {
      const certEl = certContent.value
      if (certEl) {
        html2canvas(certEl, { useCORS: true }).then(canvas => {
          const imageUrl = canvas.toDataURL('image/png')
          console.log(imageUrl)
          const link = document.createElement('a')
          link.href = imageUrl
          link.download = 'certificate.png'
          link.click()
        })
      }
    }

    return { certContent, name, isFocused, save }
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
