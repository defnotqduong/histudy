<template>
  <HeroBannerV1 />
  <Topic />
  <PopularCourse />
  <ChooseUs />
  <AboutUsV2 />
  <Feedback />
  <PopularPost />
  <EduInfoHubV1 />
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'

import HeroBannerV1 from '@/components/Banner/HeroBannerV1.vue'
import Topic from '@/components/Topic/Topic.vue'
import PopularCourse from '@/components/PopularCourse/PopularCourse.vue'
import ChooseUs from '@/components/ChooseUs/ChooseUs.vue'
import Feedback from '@/components/Feedback/Feedback.vue'
import PopularPost from '@/components/Blog/PopularPost.vue'
import AboutUsV1 from '@/components/About/AboutUsV1.vue'
import AboutUsV2 from '@/components/About/AboutUsV2.vue'
import EduInfoHubV1 from '@/components/EduInfoHub/EduInfoHubV1.vue'
export default defineComponent({
  components: {
    HeroBannerV1,
    Topic,
    PopularCourse,
    ChooseUs,
    Feedback,
    PopularPost,
    AboutUsV1,
    AboutUsV2,
    EduInfoHubV1
  },
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
