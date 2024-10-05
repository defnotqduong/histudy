<template>
  <div>FAQ</div>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'

export default defineComponent({
  components: {},
  setup() {
    const homeStore = useHomeStore()

    return {
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
