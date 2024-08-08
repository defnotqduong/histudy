<template>
  <main class="relative">
    <TopBannerV2 />
    <HeaderV2 />
    <router-view></router-view>
    <CartSideMenu />
    <BackToTopButton />
    <Toast v-if="homeStore.toast.isShow" :type="homeStore.toast.type" :message="homeStore.toast.message" />
    <Footer />
  </main>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'

import TopBannerV2 from '@/components/TopBanner/TopBannerV2.vue'
import HeaderV1 from '@/components/Header/HeaderV1.vue'
import HeaderV2 from '@/components/Header/HeaderV2.vue'
import CartSideMenu from '@/components/Cart/CartSideMenu.vue'
import BackToTopButton from '@/components/Button/BackToTopButton.vue'
import Toast from '@/components/Toast/Toast.vue'
import Footer from '@/components/Footer/Footer.vue'
export default defineComponent({
  components: {
    TopBannerV2,
    HeaderV1,
    HeaderV2,
    CartSideMenu,
    BackToTopButton,
    Toast,
    Footer
  },
  setup() {
    const homeStore = useHomeStore()

    return { homeStore }
  }
})
</script>

<style></style>
