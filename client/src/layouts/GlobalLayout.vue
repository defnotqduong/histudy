<template>
  <main class="relative">
    <TopBannerV2 />
    <HeaderV2 />
    <router-view></router-view>
    <CartSideMenu />
    <SidebarMenu />
    <BackToTopButton />
    <FooterV1 />
  </main>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'

import TopBannerV2 from '@/components/TopBanner/TopBannerV2.vue'
import HeaderV2 from '@/components/Header/HeaderV2.vue'
import CartSideMenu from '@/components/Cart/CartSideMenu.vue'
import SidebarMenu from '@/components/Header/SidebarMenu.vue'
import BackToTopButton from '@/components/Button/BackToTopButton.vue'
import FooterV1 from '@/components/Footer/FooterV1.vue'
export default defineComponent({
  components: {
    TopBannerV2,
    HeaderV2,
    CartSideMenu,
    SidebarMenu,
    BackToTopButton,
    FooterV1
  },
  setup() {
    const homeStore = useHomeStore()

    return { homeStore }
  }
})
</script>

<style></style>
