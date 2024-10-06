<template>
  <div>Error</div>
</template>

<script>
import { defineComponent } from 'vue'
import { useRouter } from 'vue-router'
export default defineComponent({
  setup() {
    const router = useRouter()

    router.push({ name: 'dashboard' })
  }
})
</script>

<style></style>
