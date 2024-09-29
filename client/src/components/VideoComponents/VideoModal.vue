<template>
  <div>
    <div class="fixed top-0 left-0 right-0 bottom-0 bg-overlayColor backdrop-blur z-[9999] cursor-pointer transition-all duration-[350ms]" @click="handleClick">
      <div class="w-full h-full flex items-center justify-center">
        <VideoPlayer :url="url" />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore, useUserStore } from '@/stores'

import VideoPlayer from '@/components/VideoComponents/VideoPlayer.vue'
export default defineComponent({
  components: { VideoPlayer },
  props: {
    url: String
  },
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()

    const handleClick = () => {
      homeStore.onChangeVideo({ show: false, url: '' })
    }

    return { homeStore, userStore, handleClick }
  }
})
</script>

<style></style>
