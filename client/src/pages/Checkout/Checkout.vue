<template>
  <div class="pb-20 md:pb-28 border-b-[1px] border-borderColor">
    <div class="bg-gradient09">
      <div class="container py-14 mx-auto px-4">
        <div class="flex flex-col items-center justify-center">
          <h1 class="text-3xl sm:text-4xl xl:text-5xl text-headingColor font-black">Checkout</h1>
          <div class="breadcrumbs text-sm text-headingColor">
            <ul>
              <li class="hover:text-primaryColor transition-all duration-300"><router-link :to="{ name: 'home' }">Home</router-link></li>
              <li class="opacity-60">Checkout</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { useHomeStore } from '@/stores'

import { getCourseForCheckout } from '@/webServices/checkoutService'
export default defineComponent({
  setup() {
    const homeStore = useHomeStore()
    const route = useRoute()
    const router = useRouter()

    const id = ref(route.params.courseId)
    const course = ref(null)
    const loading = ref(false)

    const fetchData = async () => {
      loading.value = true

      const res = await getCourseForCheckout(id.value)

      if (!res.success) router.push({ name: 'home' })

      if (res.success) course.value = res.course

      loading.value = false
    }

    onMounted(async () => {
      await fetchData()
    })
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
