<template>
  <div class="mt-4 relative max-w-[860px]">
    <label for="name" class="absolute top-1/2 left-0 -translate-y-1/2 w-full h-10 mt-2">
      <div class="text-center text-4xl text-thirtyColor" style="font-family: 'GreatVibes', cursive">Phan Quang Duong</div>
    </label>
    <img :src="cert?.template_url" class="w-full object-contain object-center" alt="Certificate" />
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router'
import VuePdfEmbed from 'vue-pdf-embed'

import 'vue-pdf-embed/dist/styles/annotationLayer.css'
import 'vue-pdf-embed/dist/styles/textLayer.css'

export default defineComponent({
  components: { VuePdfEmbed },
  props: {
    cert: Object
  },
  setup() {
    const router = useRouter()

    return {}
  }
})
</script>

<style></style>
