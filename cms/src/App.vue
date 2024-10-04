<template>
  <div>
    <GlobalLoadingV1 v-if="loading" />
    <router-view v-else />
    <Toast v-if="homeStore.toast.isShow" :type="homeStore.toast.type" :message="homeStore.toast.message" />
    <VideoModal v-if="homeStore.videoModal.isShow" :url="homeStore.videoModal.videoUrl" />
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'

import GlobalLoadingV1 from '@/components/Loading/GlobalLoadingV1.vue'
import Toast from '@/components/Toast/Toast.vue'
import VideoModal from '@/components/VideoComponents/VideoModal.vue'
export default defineComponent({
  components: { GlobalLoadingV1, Toast, VideoModal },
  setup() {
    const userStore = useUserStore()
    const homeStore = useHomeStore()
    const loading = ref(false)

    return {
      homeStore,
      userStore,
      loading
    }
  },
  methods: {
    async loadData() {
      this.loading = true

      setTimeout(() => {
        this.loading = false
      }, 1000)
    }
  },
  created() {
    this.loadData()
  }
})
</script>

<style></style>
