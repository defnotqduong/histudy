<template>
  <Swiper :modules="modules" :slides-per-view="1" :navigation="true" :loop="true" class="h-[640px] hero-banner">
    <SwiperSlide
      :style="{ backgroundImage: 'url(/src/assets/images/bg-image-01.jpg)' }"
      class="relative w-full h-full bg-no-repeat bg-cover bg-center after:absolute after:content after:top-0 after:left-0 after:w-full after:h-full after:bg-gradient04 after:opacity-50"
    >
      <div class="absolute top-0 left-0 w-full h-full z-[1] flex items-center justify-center">
        <div class="container mx-auto px-4">
          <div class="px-10">
            <div class="flex items-center justify-center section-title">
              <span class="mb-8 py-2 px-5 text-sm font-extrabold text-whiteColor tracking-wider leading-4 bg-whiteOpacityColor rounded-full"
                >BASED ON THE BEST HISTUDY</span
              >
            </div>
            <h1 class="text-center text-6xl font-black text-whiteColor title">
              Histudy Starter is a community <br />
              <strong>for creative people.</strong>
            </h1>
            <div class="mt-10 flex items-center justify-center button-group">
              <GradientButtonV3 :content="'More About Course'" :link="'home'" />
            </div>
            <div class="mt-10 flex flex-col items-center justify-center social-share-wrapper">
              <SocialListV1 />
              <span class="mt-2 text-sm text-whiteColor opacity-70">Follow By Facebook, Twitter, Instagram, and Linkedin</span>
            </div>
          </div>
        </div>
      </div>
    </SwiperSlide>
    <SwiperSlide
      :style="{ backgroundImage: 'url(/src/assets/images/bg-image-02.jpg)' }"
      class="relative w-full h-full bg-no-repeat bg-cover bg-center after:absolute after:content after:top-0 after:left-0 after:w-full after:h-full after:bg-blackColor after:opacity-50"
    >
      <div class="absolute top-0 left-0 w-full h-full z-[1] flex items-center justify-center">
        <div class="container mx-auto px-4">
          <div class="px-10">
            <div class="flex items-center justify-center section-title">
              <span class="mb-8 py-2 px-5 text-sm font-extrabold text-whiteColor tracking-wider leading-4 bg-whiteOpacityColor rounded-full"
                >BASED ON THE BEST HISTUDY</span
              >
            </div>
            <h1 class="text-center text-6xl font-black text-whiteColor title">
              Histudy Starter is a community <br />
              <strong>for creative people.</strong>
            </h1>
            <div class="mt-10 flex items-center justify-center button-group">
              <GradientButtonV3 :content="'More About Course'" :link="'home'" />
            </div>
            <div class="mt-10 flex flex-col items-center justify-center social-share-wrapper">
              <SocialListV1 />
              <span class="mt-2 text-sm text-whiteColor opacity-70">Follow By Facebook, Twitter, Instagram, and Linkedin</span>
            </div>
          </div>
        </div>
      </div></SwiperSlide
    >
    <SwiperSlide
      :style="{ backgroundImage: 'url(/src/assets/images/bg-image-03.jpg)' }"
      class="relative w-full h-full bg-no-repeat bg-cover bg-center after:absolute after:content after:top-0 after:left-0 after:w-full after:h-full after:bg-gradient04 after:opacity-50"
    >
      <div class="absolute top-0 left-0 w-full h-full z-[1] flex items-center justify-center">
        <div class="container mx-auto px-4">
          <div class="px-10">
            <div class="flex items-center justify-center section-title">
              <span class="mb-8 py-2 px-5 text-sm font-extrabold text-whiteColor tracking-wider leading-4 bg-whiteOpacityColor rounded-full"
                >BASED ON THE BEST HISTUDY</span
              >
            </div>
            <h1 class="text-center text-6xl font-black text-whiteColor title">
              Histudy Starter is a community <br />
              <strong>for creative people.</strong>
            </h1>
            <div class="mt-10 flex items-center justify-center button-group">
              <GradientButtonV3 :content="'More About Course'" :link="'home'" />
            </div>
            <div class="mt-10 flex flex-col items-center justify-center social-share-wrapper">
              <SocialListV1 />
              <span class="mt-2 text-sm text-whiteColor opacity-70">Follow By Facebook, Twitter, Instagram, and Linkedin</span>
            </div>
          </div>
        </div>
      </div></SwiperSlide
    >
  </Swiper>
</template>

<script>
import { defineComponent } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'

import GradientButtonV3 from '@/components/Button/GradientButtonV3.vue'
import SocialListV1 from '@/components/SocialList/SocialListV1.vue'
SocialListV1
export default defineComponent({
  components: {
    Swiper,
    SwiperSlide,
    GradientButtonV3,
    SocialListV1
  },
  setup() {
    return {
      modules: [Navigation]
    }
  }
})
</script>

<style>
.hero-banner .swiper-button-prev,
.hero-banner .swiper-button-next {
  height: 48px;
  width: 48px;
  border-radius: 100%;
  opacity: 0;
  transition: opacity 0.5s;
  @apply text-bodyColor;
}

.hero-banner:hover .swiper-button-prev,
.hero-banner:hover .swiper-button-next {
  opacity: 1;
}

.hero-banner .swiper-button-prev::before,
.hero-banner .swiper-button-next::before {
  position: absolute;
  content: '';
  width: 100%;
  height: 100%;
  border-radius: 100%;
  transition: transform 0.4s cubic-bezier(0.785, 0.135, 0.15, 0.86);
  @apply bg-whiteColor;
}

.hero-banner .swiper-button-prev:hover::before,
.hero-banner .swiper-button-next:hover::before {
  transform: scale(1.2);
}

.hero-banner .swiper-button-prev:after,
.hero-banner .swiper-button-next:after {
  position: absolute;
  content: '';
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: inline-block;
  width: 14px;
  height: 14px;
  background-size: cover;
  background-repeat: no-repeat;
}

.hero-banner .swiper-button-prev:after {
  background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" fill="%236B7385" width="800px" height="800px" viewBox="0 0 24 24"%3E%3Cscript xmlns=""/%3E%3Cpath d="M1.293,12.707a1,1,0,0,1-.216-.325.986.986,0,0,1,0-.764,1,1,0,0,1,.216-.325l8-8a1,1,0,1,1,1.414,1.414L4.414,11H22a1,1,0,0,1,0,2H4.414l6.293,6.293a1,1,0,0,1-1.414,1.414Z"/%3E%3Cscript xmlns=""/%3E%3C/svg%3E');
}

.hero-banner .swiper-button-next:after {
  background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns="http://www.w3.org/2000/svg" fill="%236B7385" width="800px" height="800px" viewBox="0 0 24 24"%3E%3Cpath d="M14.707,20.707a1,1,0,0,1-1.414-1.414L19.586,13H2a1,1,0,0,1,0-2H19.586L13.293,4.707a1,1,0,0,1,1.414-1.414l8,8a1,1,0,0,1,.216.325.986.986,0,0,1,0,.764,1,1,0,0,1-.216.325Z"/%3E%3C/svg%3E');
}

.section-title {
  animation-fill-mode: both;
  animation-duration: 1s;
  animation-delay: 0.5s;
}

.title {
  animation-fill-mode: both;
  animation-duration: 1s;
  animation-delay: 1s;
}

.button-group {
  animation-fill-mode: both;
  animation-duration: 1s;
  animation-delay: 1.2s;
}

.social-share-wrapper {
  animation-fill-mode: both;
  animation-duration: 1s;
  animation-delay: 1.5s;
}

.swiper-slide-active .section-title,
.swiper-slide-active .title,
.swiper-slide-active .button-group,
.swiper-slide-active .social-share-wrapper {
  animation-name: fadeInUp;
}

.swiper-slide-prev .section-title,
.swiper-slide-prev .title,
.swiper-slide-prev .button-group,
.swiper-slide-prev .social-share-wrapper,
.swiper-slide-next .section-title,
.swiper-slide-next .title,
.swiper-slide-next .button-group,
.swiper-slide-next .social-share-wrapper {
  animation-name: fadeOutUp;
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translate3d(0, 100%, 0);
  }
  100% {
    opacity: 1;
    transform: none;
  }
}

@keyframes fadeOutUp {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    transform: translate3d(0, -100%, 0);
  }
}
</style>
