<template>
  <div>
    <div class="relative">
      <div class="relative" ref="certContentImage">
        <label for="name" class="absolute left-0 w-full h-10 top-1/2 -translate-y-1/2 -mt-4">
          <div class="text-center text-4xl text-thirtyColor" style="font-family: 'GreatVibes', cursive">
            {{ name }}
          </div>
        </label>
        <img :src="cert?.template_url" class="w-full object-contain object-center" alt="Certificate" />
      </div>
      <div class="absolute top-0 left-0 w-full h-full z-10" ref="certContentDisplay">
        <label for="name" class="absolute left-0 w-full h-10 top-1/2 -translate-y-1/2 mt-2">
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
    </div>
    <div class="mt-6 flex items-center justify-center gap-4">
      <button
        @click="save"
        class="px-6 h-10 bg-primaryOpacityColor text-primaryColor font-bold rounded-full transition-all duration-300 hover:bg-primaryColor hover:text-whiteColor hover:translate-y-[-2px]"
      >
        Save
      </button>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'
import html2canvas from 'html2canvas'

import { createCertificate } from '@/webServices/learningService'

export default defineComponent({
  components: {},
  props: {
    cert: Object,
    slug: String,
    fetchData: Function
  },
  setup(props) {
    const router = useRouter()
    const homeStore = useHomeStore()

    const certContentDisplay = ref(null)
    const certContentImage = ref(null)
    const name = ref('')
    const isFocused = ref(false)

    const save = async () => {
      if (!name.value || name.value.trim() === '') {
        homeStore.onChangeToast({
          show: true,
          type: 'error',
          message: 'Please enter your name'
        })
        return
      }

      const certEl = certContentImage.value
      if (certEl) {
        html2canvas(certEl, { proxy: props.cert.template_url }).then(async canvas => {
          const imageBase64 = canvas.toDataURL('image/png')

          const blob = await fetch(imageBase64).then(res => res.blob())

          const formData = new FormData()
          formData.append('file', blob, 'certificate.png')

          const res = await createCertificate(props.slug, formData)

          if (res.success) props.fetchData()
        })
      }
    }

    return { certContentDisplay, certContentImage, name, isFocused, save }
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
