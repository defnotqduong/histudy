<template>
  <div>
    <GlobalLoadingV1 v-if="loading" />
    <router-view v-else />
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { gtka } from '@/helpers/localStorageHelper'
import { getUserProfile } from '@/webServices/authorizationService'
import { getPopularCourses } from '@/webServices/courseService'

import GlobalLoadingV1 from '@/components/Loading/GlobalLoadingV1.vue'
export default defineComponent({
  components: { GlobalLoadingV1 },
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

      const userPromise = () => (accToken ? getUserProfile() : Promise.resolve(null))

      const [userData, coursesData] = await Promise.all([userPromise(), getPopularCourses()])

      console.log('user', userData)

      console.log('popular courses', coursesData)

      if (userData?.success) this.userStore.setUser(userData.user)
      if (coursesData?.success) this.homeStore.setPopularCourses(coursesData.courses)

      this.loading = false
    }
  },
  created() {
    this.loadData()
  }
})
</script>

<style></style>
