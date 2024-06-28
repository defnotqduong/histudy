<template>
  <div class="relative">
    <TopBannerV2 />
    <HeaderV2 />
    <HeroBannerV1 />
    <Toppic />
    <PopularCourse />
    <CartSideMenu />
    <Footer />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'

import TopBannerV1 from '@/components/TopBanner/TopBannerV1.vue'
import TopBannerV2 from '@/components/TopBanner/TopBannerV2.vue'
import HeaderV1 from '@/components/Header/HeaderV1.vue'
import HeaderV2 from '@/components/Header/HeaderV2.vue'
import HeroBannerV1 from '@/components/Banner/HeroBannerV1.vue'
import Toppic from '@/components/Toppic/Toppic.vue'
import PopularCourse from '@/components/PopularCourse/PopularCourse.vue'
import Footer from '@/components/Footer/Footer.vue'
import CartSideMenu from '@/components/Cart/CartSideMenu.vue'
export default defineComponent({
  components: { TopBannerV1, TopBannerV2, HeaderV1, HeaderV2, HeroBannerV1, Toppic, PopularCourse, CartSideMenu, Footer },
  setup() {
    const homeStore = useHomeStore()

    return {
      homeStore
    }
  }
})
</script>

<style></style>
