<template>
  <div>
    <div
      class="fixed top-0 left-0 right-0 bottom-0 bg-overlayColor backdrop-blur z-[9999] cursor-pointer transition-all duration-[350ms]"
      :class="homeStore.isShowCartSideMenu ? 'opacity-100 visible' : 'opacity-0 invisible'"
      @click="handleClick"
    ></div>
    <div class="cart-side-menu w-full sm:w-[80%] lg:w-[60%] xl:w-[50%]" :class="{ 'side-menu-active': homeStore.isShowCartSideMenu }">
      <div class="h-full pt-14 px-10">
        <div class="flex items-center justify-between">
          <h4 class="text-3xl text-headingColor font-extrabold">Your shopping cart</h4>
          <CloseButton :color="'blackColor'" :func="handleClick" />
        </div>
        <div class="h-full flex items-center justify-center" v-if="userStore.cart.length === 0">
          <img src="@/assets/icons/cart-empty.svg" alt="Cart empty" />
        </div>
        <div v-else class="py-6 relative">
          <CourseCardV5 v-for="course in userStore.cart" :key="course.id" :course="course" class="mb-5" />
          <GradientButtonV4 class="w-full" :content="'View Cart'" :func="redirect" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'

import CloseButton from '@/components/Button/CloseButton.vue'
import CourseCardV5 from '@/components/Course/CourseCard/CourseCardV5.vue'
import GradientButtonV4 from '@/components/Button/GradientButtonV4.vue'
export default defineComponent({
  components: { CloseButton, CourseCardV5, GradientButtonV4 },
  setup() {
    const router = useRouter()
    const homeStore = useHomeStore()
    const userStore = useUserStore()

    const handleClick = () => {
      homeStore.onChangeShowCartSideMenu()
    }

    const redirect = () => {
      homeStore.onChangeShowCartSideMenu()
      router.push({ name: 'cart' })
    }

    return { homeStore, userStore, handleClick, redirect }
  }
})
</script>

<style scoped>
.cart-side-menu {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 10000;
  transform: translateX(100%);
  overflow-y: auto;
  overscroll-behavior: contain;
  transition: transform 0.85s cubic-bezier(0.23, 1, 0.32, 1);
  @apply bg-whiteColor;
}

.cart-side-menu.side-menu-active {
  transform: translateX(0);
}
</style>
