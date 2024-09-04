<template>
  <div
    class="relative lg:sticky top-0 lg:top-24 z-10 mt-0 lg:mt-[-460px] py-7 bg-gradient12 shadow-shadow01 rounded-md overflow-hidden after:absolute after:content after:top-[3px] after:left-[3px] after:right-[3px] after:bottom-[3px] after:bg-whiteColor after:z-[-1] after:rounded-md"
  >
    <div class="mb-7 px-7">
      <a href="">
        <div class="relative">
          <img :src="course?.thumbnail_url" class="w-full h-60 object-cover object-center rounded-md" alt="Video" />
          <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
            <PlayVideoButton />
          </div>
        </div>
      </a>
    </div>
    <div class="mb-7 px-7">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <span class="text-2xl text-primaryColor font-extrabold">{{ formattedPrice }}</span>
          <!-- <span class="ml-[6px] text-xl text-bodyColor font-bold opacity-40 line-through">$25</span> -->
        </div>
        <div>
          <span class="px-5 py-1 flex items-center justify-center gap-1 text-dangerColor bg-dangerOpacityColor rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
              <path
                d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              /></svg
            >3 days left!</span
          >
        </div>
      </div>
      <div v-if="!isInCart" class="mt-5">
        <GradientButtonV5 class="w-full h-[60px]" :content="'Add to Cart'" :func="addToCart" :loading="loading" />
      </div>
      <div v-else class="mt-5">
        <GradientButtonV5 class="w-full h-[60px]" :content="'View Cart'" :func="redirect" />
      </div>
      <div class="mt-5">
        <ButtonV5 class="w-full h-[60px]" :content="'Buy Now'" :func="buyNow" />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, computed, ref } from 'vue'
import { useRouter } from 'vue-router'
import { formatPrice } from '@/utils'
import { useUserStore } from '@/stores'
import { addCourseToCart, getCart } from '@/webServices/cartService'

import GradientButtonV5 from '@/components/Button/GradientButtonV5.vue'
import ButtonV5 from '@/components/Button/ButtonV5.vue'
import PlayVideoButton from '@/components/Button/PlayVideoButton.vue'
import LoadingV1 from '@/components/Loading/LoadingV1.vue'
export default defineComponent({
  components: { GradientButtonV5, ButtonV5, PlayVideoButton, LoadingV1 },
  props: {
    course: Object
  },
  setup(props) {
    const userStore = useUserStore()
    const router = useRouter()

    const loading = ref(false)
    const id = ref(props.course?.id)

    const formattedPrice = computed(() => {
      return props.course?.price > 0 ? formatPrice(props.course?.price) : 'Free'
    })

    const isInCart = computed(() => {
      return userStore.cart.some(course => course?.id === props.course?.id)
    })

    const redirect = () => {
      router.push({ name: 'cart' })
    }
    const addToCart = async () => {
      loading.value = true

      const res = await addCourseToCart({ courseId: id.value })

      if (res.success) {
        const cartData = await getCart()
        userStore.setCart(cartData.cart.courses)
      }

      loading.value = false
    }

    const buyNow = () => {
      alert('Buy now')
    }

    return {
      loading,
      id,
      formattedPrice,
      isInCart,
      redirect,
      addToCart,
      buyNow
    }
  }
})
</script>

<style></style>
