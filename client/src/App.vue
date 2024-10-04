<template>
  <div>
    <GlobalLoadingV1 v-if="loading" />
    <router-view v-else />
    <Toast v-if="homeStore.toast.isShow" :type="homeStore.toast.type" :message="homeStore.toast.message" />
    <VideoModal v-if="homeStore.videoModal.isShow" :url="homeStore.videoModal.videoUrl" />
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { gtka } from '@/helpers/localStorageHelper'
import { getUserProfile } from '@/webServices/authorizationService'
import { getPopularCourses, getPurchasedCourses } from '@/webServices/courseService'
import { getAllCategories } from '@/webServices/categoryService'
import { getCart } from '@/webServices/cartService'
import { getWishlist } from '@/webServices/wishlistService'
import { getAllCert } from '@/webServices/certService'
import { getAllOrder } from '@/webServices/orderService'

import GlobalLoadingV1 from '@/components/Loading/GlobalLoadingV1.vue'
import Toast from '@/components/Toast/Toast.vue'
import VideoModal from '@/components/VideoComponents/VideoModal.vue'
export default defineComponent({
  components: { GlobalLoadingV1, Toast, VideoModal },
  setup() {
    const userStore = useUserStore()
    const homeStore = useHomeStore()
    const loading = ref(false)

    return {
      homeStore,
      userStore,
      loading
    }
  },
  methods: {
    async loadData() {
      this.loading = true

      const accToken = gtka()

      const userPromise = accToken
        ? Promise.all([getUserProfile(), getPurchasedCourses(), getCart(), getWishlist(), getAllCert(), getAllOrder()]).then(
            ([profile, purchasedCourses, cart, wishlist, certs, orders]) => ({
              success: true,
              user: profile.user,
              purchased_courses: purchasedCourses.courses,
              cart: cart.cart,
              wishlist: wishlist.wishlist,
              certs: certs.certs,
              orders: orders.orders
            })
          )
        : Promise.resolve(null)

      const [userData, coursesData, categoriesData] = await Promise.all([userPromise, getPopularCourses(), getAllCategories()])

      console.log('user', userData)

      console.log('popular courses', coursesData)

      console.log('categories', categoriesData)

      if (userData?.success) {
        this.userStore.setUser(userData?.user)
        this.userStore.setEnrolledCourses(userData?.purchased_courses?.courses)
        this.userStore.setCart(userData?.cart?.courses)
        this.userStore.setWishlist(userData?.wishlist?.courses)
        this.userStore.setCerts(userData?.certs)
        this.userStore.setOrders(userData?.orders)
      }

      if (coursesData?.success) this.homeStore.setPopularCourses(coursesData.courses.courses)
      if (categoriesData?.success) this.homeStore.setCategories(categoriesData.categories)
      this.loading = false
    }
  },
  created() {
    this.loadData()
  }
})
</script>

<style></style>
