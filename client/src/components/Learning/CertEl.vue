<template>
  <div>
    <div class="relative">
      <img :src="cert.cert_url" alt="certificate" ref="certImage" />
    </div>
    <div class="mt-6 flex items-center justify-center gap-4">
      <button
        @click="downloadPDF"
        class="px-6 h-10 bg-whiteColor text-primaryColor font-bold border-[2px] border-primaryColor rounded-full transition-all duration-300 hover:text-whiteColor hover:bg-primaryColor hover:translate-y-[-2px]"
      >
        Download
      </button>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import jsPDF from 'jspdf'

export default defineComponent({
  props: {
    cert: Object,
    course: Object
  },
  setup(props) {
    const certImage = ref(null)

    const downloadPDF = () => {
      const img = certImage.value

      if (img) {
        const imgWidth = img.naturalWidth
        const imgHeight = img.naturalHeight

        const mmWidth = imgWidth * 0.264583
        const mmHeight = imgHeight * 0.264583

        const pdf = new jsPDF({
          orientation: mmWidth > mmHeight ? 'landscape' : 'portrait',
          unit: 'mm',
          format: [mmWidth, mmHeight]
        })

        pdf.addImage(img.src, 'png', 0, 0, mmWidth, mmHeight)

        pdf.save(`${props.course.title} Certificate.pdf`)
      }
    }

    return { certImage, downloadPDF }
  }
})
</script>

<style></style>
