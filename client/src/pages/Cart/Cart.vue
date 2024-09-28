<template>
  <div class="pb-20 md:pb-28 border-b-[1px] border-borderColor">
    <div class="bg-gradient09">
      <div class="container py-14 mx-auto px-4">
        <div class="flex flex-col items-center justify-center">
          <h1 class="text-3xl sm:text-4xl xl:text-5xl text-headingColor font-black">Cart</h1>
          <div class="breadcrumbs text-sm text-headingColor">
            <ul>
              <li class="hover:text-primaryColor transition-all duration-300"><router-link :to="{ name: 'home' }">Home</router-link></li>
              <li class="opacity-60">Cart</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-16 flex items-center justify-center" v-if="userStore.cart.length === 0">
      <img src="@/assets/icons/cart-empty.svg" alt="Cart empty" />
    </div>
    <div v-else class="container mt-16 mx-auto px-4">
      <CourseTable :courses="userStore.cart" :loading="loading" :remove="remove" :purchase="purchase" />
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore, useHomeStore } from '@/stores'
import { removeCourseFromCart, getCart } from '@/webServices/cartService'

import CourseTable from '@/components/Course/CourseTable/CourseTable.vue'

export default defineComponent({
  components: { CourseTable },
  setup() {
    const router = useRouter()
    const userStore = useUserStore()
    const homeStore = useHomeStore()

    const loading = ref(false)

    const remove = async id => {
      loading.value = true

      const res = await removeCourseFromCart(id)

      if (!res.success) homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })

      if (res.success) {
        const cartData = await getCart()
        userStore.setCart(cartData.cart.courses)
      }
      loading.value = false
    }
    const purchase = id => {
      router.push({ name: 'checkout', params: { courseId: id } })
    }

    return {
      userStore,
      homeStore,
      loading,
      remove,
      purchase
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
