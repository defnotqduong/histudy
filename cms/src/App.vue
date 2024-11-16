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
import { gtka } from '@/helpers/localStorageHelper'
import { getUserProfile } from '@/webServices/authorizationService'
import { getListNotiByUser } from '@/webServices/notificationService'

import { connectSocket } from '@/configs/socketConfig.js'

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

      const accToken = gtka()

      const userPromise = accToken
        ? Promise.all([getUserProfile(), getListNotiByUser()]).then(([profile, notis]) => ({
            success: true,
            user: profile?.user,
            notifications: notis?.notifications
          }))
        : Promise.resolve(null)

      const [userData] = await Promise.all([userPromise])

      if (userData?.success) {
        this.userStore.setUser(userData?.user)
        this.userStore.setNotification(userData?.notifications)

        const socket = connectSocket(userData.user.id)

        socket.on('connect', () => {})

        socket.on('message', data => {
          this.userStore.setNotification([data])
        })
      }

      this.loading = false
    }
  },
  created() {
    this.loadData()
  }
})
</script>

<style></style>
