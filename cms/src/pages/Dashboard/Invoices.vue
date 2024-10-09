<template>
  <div class="pt-10 pb-40">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>

    <div v-if="!loading">
      <div class="mb-6 pb-5 flex items-end justify-between border-b-[1px] border-borderColor">
        <h4 class="text-xl text-headingColor font-extrabold">Invoice List</h4>
      </div>
      <div v-if="invoices.length === 0" class="mt-4 ml-6 italic">No invoices yet</div>
      <div v-else class="overflow-x-auto">
        <table class="table table-pin-rows">
          <thead>
            <tr>
              <th>Invoice ID</th>
              <th>Course Name</th>
              <th>Customer</th>
              <th>Email</th>
              <th>Price</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(invoice, index) in invoices" :key="index">
              <td># {{ invoice.id }}</td>
              <td class="text-headingColor font-bold">
                {{ invoice?.course?.title }}
              </td>
              <td>
                {{ invoice?.customer?.name }}
              </td>
              <td>{{ invoice?.customer?.email }}</td>
              <td>
                {{ invoice?.course?.price === 0 ? 'Free' : formatPrice(invoice?.course?.price) }}
              </td>
              <td>{{ formatTimeLong(invoice?.purchase_date) }}</td>
              <td>
                <span class="px-3 py-1 rounded-full text-whiteColor text-xs text-center bg-successColor leading-none"> Success </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent, ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'
import { getAllInvoiceForInstructor } from '@/webServices/orderService'
import { formatPrice, formatTimeLong } from '@/utils'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'

export default defineComponent({
  components: { LoadingV1 },
  setup() {
    const router = useRouter()
    const userStore = useUserStore()
    const homeStore = useHomeStore()

    const invoices = ref([])
    const loading = ref(false)

    const checkUserRole = async () => {
      if (!userStore.user?.roles.includes('instructor')) {
        router.push({ name: 'dashboard' })
        return false
      }
      return true
    }

    const fetchData = async () => {
      loading.value = true

      const res = await getAllInvoiceForInstructor()

      console.log(res)

      if (res.success) invoices.value = res.invoices

      loading.value = false
    }

    onMounted(async () => {
      const hasRole = await checkUserRole()
      if (hasRole) {
        await fetchData()
      }
    })

    return {
      homeStore,
      invoices,
      loading,
      formatPrice,
      formatTimeLong
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

<style scoped>
.table thead {
  background-size: 300% 100%;
  @apply bg-primaryOpacityColor;
}
.table th {
  @apply text-base text-headingColor font-bold;
}

.table thead tr {
  border-bottom: none;
}

.table tbody tr {
  @apply text-base text-bodyColor font-semibold border-b border-borderColor;
}

.table td {
  padding-top: 24px;
  padding-bottom: 24px;
}
</style>
