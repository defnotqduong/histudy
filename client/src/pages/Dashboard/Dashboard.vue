<template>
  <div>Dashboard</div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
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
