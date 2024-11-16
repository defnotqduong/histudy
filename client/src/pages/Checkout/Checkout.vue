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
    <div class="container mx-auto px-4 mt-16">
      <div class="mt-4 mb-12">
        <div v-if="isPaid" class="flex gap-2">
          <p class="text-headingColor">You have successfully completed the payment. You can start learning right now!</p>
          <button>
            <router-link
              :to="{ name: 'learning', params: { slug: course?.slug } }"
              class="flex items-center justify-center gap-1 text-headingColor font-bold cursor-pointer relative transition-all duration-[400ms] after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[2px] after:rounded after:bg-primaryColor hover:text-primaryColor hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-[400ms]"
              >Start now
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                  fill="currentColor"
                />
              </svg>
            </router-link>
          </button>
        </div>
      </div>
      <div class="grid grid-cols-12 gap-16">
        <div class="col-span-8">
          <div>
            <div class="flex items-center justify-between">
              <h3 class="text-xl text-headingColor font-extrabold">Payment method</h3>
              <div class="flex items-center gap-2 text-sm">
                Secure connection
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 64 64" class="mb-1 text-headingColor">
                  <path
                    fill="currentColor"
                    d="M52,24h-4v-8c0-8.836-7.164-16-16-16S16,7.164,16,16v8h-4c-2.211,0-4,1.789-4,4v32c0,2.211,1.789,4,4,4h40  c2.211,0,4-1.789,4-4V28C56,25.789,54.211,24,52,24z M32,48c-2.211,0-4-1.789-4-4s1.789-4,4-4s4,1.789,4,4S34.211,48,32,48z M40,24  H24v-8c0-4.418,3.582-8,8-8s8,3.582,8,8V24z"
                  />
                </svg>
              </div>
            </div>
            <div class="mt-4">
              <div>Paypal</div>
              <div>Credit Card/Debit Card</div>
            </div>
          </div>
          <div class="mt-20">
            <h3 class="text-xl text-headingColor font-extrabold">Order Infomation</h3>
            <div class="mt-6 flex items-center justify-start">
              <img :src="course?.thumbnail_url" class="w-40 h-32 object-cover object-center rounded-md" alt="course thumbnail" />
              <div class="ml-6 text-lg text-headingColor font-extrabold">
                {{ course?.title }}
              </div>
              <div class="ml-auto font-bold">{{ course?.price === 0 ? 'Free' : formatPrice(course?.price) }}</div>
            </div>
          </div>
        </div>
        <div class="col-span-4">
          <h2 class="mb-4 text-2xl text-headingColor font-extrabold">Summary</h2>
          <div class="mb-2 flex items-center justify-between text-headingColor">
            <span>Original price:</span>
            <span>{{ course?.price === 0 ? 'Free' : formatPrice(course?.price) }}</span>
          </div>
          <div class="flex items-center justify-between text-headingColor">
            <span>Discount rate:</span>
            <span>- {{ formatPrice(0) }}</span>
          </div>
          <div class="my-4 border-b border-borderColor"></div>
          <div class="flex items-center justify-between text-lg text-headingColor font-extrabold">
            <span>Total:</span>
            <span>{{ course?.price === 0 ? 'Free' : formatPrice(course?.price) }}</span>
          </div>
          <div class="mt-6">
            <GradientButtonV2 :func="payment" :content="'Completed Payment'" :loading="loading" class="w-full" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'
import { formatPrice } from '@/utils'
import { getCourseForCheckout, checkoutCourse } from '@/webServices/orderService'
import { getPurchasedCourses } from '@/webServices/courseService'
import { getAllOrder } from '@/webServices/orderService'

import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'

export default defineComponent({
  components: { GradientButtonV2 },
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()
    const route = useRoute()
    const router = useRouter()

    const id = ref(route.params.courseId)
    const course = ref(null)
    const loading = ref(false)
    const isPaid = ref(false)

    const fetchData = async () => {
      loading.value = true

      const res = await getCourseForCheckout(id.value)

      if (!res.success) router.push({ name: 'home' })

      if (res.success) course.value = res.course

      loading.value = false
    }

    const payment = async () => {
      loading.value = true

      const res = await checkoutCourse(id.value)

      if (!res.success) homeStore.onChangeToast({ show: true, type: 'error', message: res.data.message })

      if (res.success) {
        const [purchasedCourses, orders] = await Promise.all([getPurchasedCourses(), getAllOrder()])

        userStore.setEnrolledCourses(purchasedCourses.courses.courses)
        userStore.setOrders(orders.orders)

        isPaid.value = true
        homeStore.onChangeToast({ show: true, type: 'success', message: 'Your payment was successfully!' })
      }

      loading.value = false
    }

    onMounted(async () => {
      await fetchData()
    })

    return {
      course,
      formatPrice,
      loading,
      isPaid,
      payment
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
