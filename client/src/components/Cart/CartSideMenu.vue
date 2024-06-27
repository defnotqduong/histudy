<template>
  <div>
    <div
      class="fixed top-0 left-0 right-0 bottom-0 bg-overlayColor backdrop-blur z-[9999] cursor-pointer transition-all duration-[350ms]"
      :class="homeStore.isShowCartSideMenu ? 'opacity-100 visible' : 'opacity-0 invisible'"
      @click="handleClick"
    ></div>
    <div class="cart-side-menu w-[40%]" :class="{ 'side-menu-active': homeStore.isShowCartSideMenu }">
      <div class="py-16 px-12">
        <div class="flex items-center justify-between">
          <h4 class="text-3xl text-headingColor font-extrabold">Your shopping cart</h4>
          <CloseButton :color="'blackColor'" :func="handleClick" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore } from '@/stores'
import CloseButton from '@/components/Button/CloseButton.vue'
export default defineComponent({
  components: { CloseButton },
  setup() {
    const homeStore = useHomeStore()

    const handleClick = () => {
      homeStore.onChangeShowCartSideMenu()
    }

    return { homeStore, handleClick }
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
  overflow: hidden;
  overscroll-behavior: contain;
  transition: transform 0.85s cubic-bezier(0.23, 1, 0.32, 1);
  @apply bg-whiteColor;
}

.cart-side-menu.side-menu-active {
  transform: translateX(0);
}
</style>
