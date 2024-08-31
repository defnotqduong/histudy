<template>
  <div>
    <GlobalLoadingV1 v-if="loading" />
    <router-view v-else />
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { gtka } from '@/helpers/localStorageHelper'
import { getUserProfile } from '@/webServices/authorizationService'
import { getPopularCourses } from '@/webServices/courseService'
import { getAllCategories } from '@/webServices/categoryService'

import GlobalLoadingV1 from '@/components/Loading/GlobalLoadingV1.vue'
export default defineComponent({
  components: { GlobalLoadingV1 },
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

      const userPromise = () => (accToken ? getUserProfile() : Promise.resolve(null))

      const [userData, coursesData, categoriesData] = await Promise.all([userPromise(), getPopularCourses(), getAllCategories()])

      console.log('user', userData)

      console.log('popular courses', coursesData)

      console.log('categories', categoriesData)

      if (userData?.success) {
        this.userStore.setUser(userData.user)
        this.userStore.setInstructorCourses(userData.courses.courses)
        this.userStore.setEnrolledCourses(userData.purchased_courses.courses)
        this.userStore.setCart(userData.cart.courses)
        this.userStore.setWishlist(userData.wishlist.courses)
      }
      if (coursesData?.success) this.homeStore.setPopularCourses(coursesData.courses.courses)
      if (categoriesData.success) this.homeStore.setCategories(categoriesData.categories)
      this.loading = false
    }
  },
  created() {
    this.loadData()
  }
})
</script>

<style></style>
