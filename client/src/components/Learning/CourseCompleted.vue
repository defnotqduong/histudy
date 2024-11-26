<template>
  <div class="mt-4">
    <VuePdfEmbed :source="cert?.template_url" class="w-[500px] h-[500px]" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
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
