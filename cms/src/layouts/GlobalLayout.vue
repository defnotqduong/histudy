<template>
  <main class="relative">
    <HeaderV1 />
    <router-view></router-view>

    <BackToTopButton />
  </main>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'

import HeaderV1 from '@/components/Header/HeaderV1.vue'
import BackToTopButton from '@/components/Button/BackToTopButton.vue'

export default defineComponent({
  components: { HeaderV1, BackToTopButton },
  setup() {
    const homeStore = useHomeStore()

    return { homeStore }
  }
})
</script>

<style></style>
