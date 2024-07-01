<template>
  <div class="relative">
    <TopBannerV2 />
    <HeaderV2 />
    <HeroBannerV1 />
    <Topic />
    <PopularCourse />
    <ChooseUs />
    <AboutUsV2 />
    <Feedback />
    <PopularPost />
    <EduInfoHubV1 />
    <CartSideMenu />
    <BackToTopButton />
    <Footer />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'

import TopBannerV2 from '@/components/TopBanner/TopBannerV2.vue'
import HeaderV1 from '@/components/Header/HeaderV1.vue'
import HeaderV2 from '@/components/Header/HeaderV2.vue'
import HeroBannerV1 from '@/components/Banner/HeroBannerV1.vue'
import Topic from '@/components/Topic/Topic.vue'
import PopularCourse from '@/components/PopularCourse/PopularCourse.vue'
import ChooseUs from '@/components/ChooseUs/ChooseUs.vue'
import Feedback from '@/components/Feedback/Feedback.vue'
import PopularPost from '@/components/Blog/PopularPost.vue'
import AboutUsV1 from '@/components/About/AboutUsV1.vue'
import AboutUsV2 from '@/components/About/AboutUsV2.vue'
import EduInfoHubV1 from '@/components/EduInfoHub/EduInfoHubV1.vue'
import CartSideMenu from '@/components/Cart/CartSideMenu.vue'
import BackToTopButton from '@/components/Button/BackToTopButton.vue'
import Footer from '@/components/Footer/Footer.vue'
export default defineComponent({
  components: {
    TopBannerV2,
    HeaderV1,
    HeaderV2,
    HeroBannerV1,
    Topic,
    PopularCourse,
    ChooseUs,
    Feedback,
    PopularPost,
    AboutUsV1,
    AboutUsV2,
    EduInfoHubV1,
    CartSideMenu,
    BackToTopButton,
    Footer
  },
  setup() {
    const homeStore = useHomeStore()

    return {
      homeStore
    }
  }
})
</script>

<style></style>
