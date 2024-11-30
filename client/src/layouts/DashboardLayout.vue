<template>
  <div class="relative">
    <div class="min-h-[300px] relative">
      <div
        class="absolute top-0 left-0 z-[-2] w-full h-full bg-gradient11 after:absolute after:content after:top-0 after:left-0 after:w-full after:h-full after:z-[-1] after:bg-overlay01"
      ></div>
    </div>
    <div class="container mx-auto px-4 relative mt-[-220px] sm:mt-[-175px]">
      <ProfileOverview class="mb-8" />
      <div class="grid grid-cols-12 gap-4 sm:gap-8">
        <div class="col-span-12 lg:col-span-3">
          <SideBar />
        </div>
        <div class="col-span-12 lg:col-span-9">
          <router-view></router-view>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, onMounted, ref } from 'vue'
import { useUserStore } from '@/stores'
import { getAllCert } from '@/webServices/certService'
import { getPurchasedCourses } from '@/webServices/courseService'
import { getAllOrder } from '@/webServices/orderService'

import SideBar from '@/components/Dashboard/SideBar.vue'
import ProfileOverview from '@/components/Dashboard/ProfileOverview.vue'
export default defineComponent({
  components: { SideBar, ProfileOverview },
  setup() {
    const userStore = useUserStore()
    const loading = ref(false)

    const fetchData = async () => {
      loading.value = true

      const [certData, courseData, orderData] = await Promise.all([getAllCert(), getPurchasedCourses(), getAllOrder()])

      userStore.setCerts(certData.certs)
      userStore.setEnrolledCourses(courseData.courses.courses)
      userStore.setOrders(orderData.orders)

      loading.value = false
    }

    onMounted(async () => {
      await fetchData()
    })
  }
})
</script>

<style></style>
