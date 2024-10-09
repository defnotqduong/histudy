<template>
  <div>Course Analytics</div>
</template>

<script>
import { defineComponent, onMounted } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { useRouter } from 'vue-router'

export default defineComponent({
  components: {},
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()
    const router = useRouter()

    const checkUserRole = async () => {
      if (!userStore.user?.roles.includes('instructor')) {
        router.push({ name: 'dashboard' })
        return false
      }
      return true
    }

    onMounted(async () => {
      const hasRole = await checkUserRole()
    })

    return {
      userStore,
      homeStore
    }
  },
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 0 })
    }
  },
  created() {
    this.scrollToTop()
  }
})
</script>

<style></style>
