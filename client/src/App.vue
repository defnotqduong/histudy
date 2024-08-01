<template>
  <div>
    <GlobalLoading v-if="loading" />
    <router-view v-else />
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useUserStore } from '@/stores'
import { gtka } from '@/helpers/localStorageHelper'
import { getUserProfile } from '@/webServices/authorizationService'
import GlobalLoading from '@/components/Loading/GlobalLoading.vue'

export default defineComponent({
  components: { GlobalLoading },
  setup() {
    const userStore = useUserStore()
    const loading = ref(false)

    return {
      userStore,
      loading
    }
  },
  methods: {
    async loadData() {
      this.loading = true

      const accToken = gtka()

      const userPromise = () => (accToken ? getUserProfile() : Promise.resolve(null))

      const [userData] = await Promise.all([userPromise()])

      if (userData?.success) this.userStore.getUser(userData.user)

      this.loading = false
    }
  },
  created() {
    this.loadData()
  }
})
</script>

<style></style>
