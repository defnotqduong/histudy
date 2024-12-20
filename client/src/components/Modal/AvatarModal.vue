<template>
  <div class="relative w-24 h-24 md:w-32 md:h-32 p-[2px] sm:p-1 bg-whiteColor border-2 border-primaryOpacityColor rounded-full">
    <img :src="user?.avatar" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
    <input type="file" id="fileAvatarInput" class="hidden" @change="handleFileUpload" />
    <div class="absolute bottom-0 right-0 w-8 h-8 sm:w-10 sm:h-10">
      <label
        for="fileAvatarInput"
        class="w-full h-full flex items-center justify-center bg-whiteColor text-primaryColor rounded-full transition-all duration-300 hover:bg-primaryColor hover:text-whiteColor cursor-pointer"
      >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-5 h-5 lg:w-6 lg:h-6">
          <path
            d="M12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10C10.3431 10 9 11.3431 9 13C9 14.6569 10.3431 16 12 16Z"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M3 16.8V9.2C3 8.0799 3 7.51984 3.21799 7.09202C3.40973 6.71569 3.71569 6.40973 4.09202 6.21799C4.51984 6 5.0799 6 6.2 6H7.25464C7.37758 6 7.43905 6 7.49576 5.9935C7.79166 5.95961 8.05705 5.79559 8.21969 5.54609C8.25086 5.49827 8.27836 5.44328 8.33333 5.33333C8.44329 5.11342 8.49827 5.00346 8.56062 4.90782C8.8859 4.40882 9.41668 4.08078 10.0085 4.01299C10.1219 4 10.2448 4 10.4907 4H13.5093C13.7552 4 13.8781 4 13.9915 4.01299C14.5833 4.08078 15.1141 4.40882 15.4394 4.90782C15.5017 5.00345 15.5567 5.11345 15.6667 5.33333C15.7216 5.44329 15.7491 5.49827 15.7803 5.54609C15.943 5.79559 16.2083 5.95961 16.5042 5.9935C16.561 6 16.6224 6 16.7454 6H17.8C18.9201 6 19.4802 6 19.908 6.21799C20.2843 6.40973 20.5903 6.71569 20.782 7.09202C21 7.51984 21 8.0799 21 9.2V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8Z"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </label>
    </div>
    <input type="checkbox" id="my_modal_avatar" class="modal-toggle" v-model="isModalOpen" />
    <div class="modal" role="dialog">
      <div class="modal-box bg-white py-6 px-8">
        <div class="modal-action mt-0 mb-2">
          <label for="my_modal_avatar" role="button" class="p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
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
          </label>
        </div>
        <div class="image-cropper" v-if="imageSrc">
          <div class="flex items-center justify-center">
            <img ref="image" :src="imageSrc" alt="Image to crop" class="w-full h-full object-cover object-center rounded-full" />
          </div>
          <div class="mt-4 flex items-center justify-end">
            <button
              @click="handleImageCropped"
              :disabled="loading"
              :class="{ 'opacity-70 cursor-not-allowed': loading }"
              class="px-4 py-2 text-whiteColor bg-primaryColor rounded-md"
            >
              Save
            </button>
          </div>
        </div>
      </div>
      <label for="my_modal_avatar" role="button" class="modal-backdrop">Close</label>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, watch, nextTick, onUnmounted, watchEffect } from 'vue'
import { useHomeStore, useUserStore } from '@/stores'
import { updateAvatar } from '@/webServices/authorizationService'
import Cropper from 'cropperjs'
import 'cropperjs/dist/cropper.css'

export default defineComponent({
  props: {
    user: Object
  },
  setup(props) {
    const homeStore = useHomeStore()
    const userStore = useUserStore()

    const file = ref(null)
    const imageSrc = ref(null)
    const isModalOpen = ref(false)
    const fileReader = new FileReader()
    const image = ref(null)
    const loading = ref(false)
    let cropper = null

    fileReader.onload = e => {
      imageSrc.value = e.target.result
    }

    const handleCropper = async () => {
      await nextTick()

      if (cropper) {
        cropper.replace(imageSrc.value)
      } else {
        cropper = new Cropper(image.value, {
          aspectRatio: 1,
          minCropBoxWidth: 396,
          minCropBoxHeight: 396,
          viewMode: 2,
          dragMode: 'move',
          cropBoxMovable: true,
          cropBoxResizable: true,
          responsive: true,
          zoomable: true,
          ready() {
            isModalOpen.value = true
          }
        })
      }
    }

    const handleFileUpload = async e => {
      if (e.target.files.length > 0) {
        file.value = e.target.files[0]
        imageSrc.value = URL.createObjectURL(file.value)

        await handleCropper()
        e.target.value = null
      }
    }

    const closeModal = () => {
      isModalOpen.value = false
    }

    const uploadImage = async blob => {
      loading.value = true

      const formData = new FormData()
      formData.append('image', blob, 'cropped-image.jpg')

      const res = await updateAvatar(formData)

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
      }

      if (res.success) {
        homeStore.onChangeToast({ show: true, type: 'success', message: 'Avatar updated Successfully !' })
        userStore.setUser(res.user)
      }

      closeModal()
      loading.value = false
    }

    const handleImageCropped = async () => {
      cropper
        .getCroppedCanvas({
          width: 256,
          height: 256
        })
        .toBlob(async blob => {
          if (blob) await uploadImage(blob)
        }, 'image/jpeg')
    }

    watchEffect(() => {
      if (file.value) {
        fileReader.readAsDataURL(file.value)
      } else {
        imageSrc.value = null
      }
    })

    onUnmounted(() => {
      if (cropper) {
        cropper.destroy()
        cropper = null
      }
    })

    return { file, imageSrc, isModalOpen, image, loading, closeModal, handleFileUpload, handleImageCropped }
  }
})
</script>

<style>
.modal {
  z-index: 20000;
}

.cropper-view-box {
  border-radius: 50%;
  overflow: hidden;
}

.cropper-face {
  border-radius: 50%;
  outline: none;
}
</style>
