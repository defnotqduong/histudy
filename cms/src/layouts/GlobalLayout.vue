<template>
  <main class="relative">
    <div class="px-4">
      <HeaderV1 />
      <SideBar />
      <router-view class="ml-60 pl-4"></router-view>
    </div>
    <BackToTopButton />
  </main>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'

import HeaderV1 from '@/components/Header/HeaderV1.vue'
import SideBar from '@/components/SideBar/SideBar.vue'
import BackToTopButton from '@/components/Button/BackToTopButton.vue'

export default defineComponent({
  components: { HeaderV1, SideBar, BackToTopButton },
  setup() {
    const homeStore = useHomeStore()

    return { homeStore }
  }
})
</script>

<style></style>
