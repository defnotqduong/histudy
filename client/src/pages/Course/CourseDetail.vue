<template>
  <div>Detail</div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 0 })
    }
  },
  mounted() {
    this.scrollToTop()
  }
})
</script>

<style></style>
