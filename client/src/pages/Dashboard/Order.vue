<template>
  <div id="child-content" class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">Order History</h4>
    </div>
    <div v-if="userStore.orders.length === 0" class="mt-4 ml-6 italic">No orders yet</div>
    <div v-else>
      <table class="table table-pin-rows">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Course Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(order, index) in userStore.orders" :key="index">
            <td># {{ order.id }}</td>
            <td>
              {{ order?.course?.title }}
            </td>
            <td>
              {{ order?.course?.price === 0 ? 'Free' : formatPrice(order?.course?.price) }}
            </td>
            <td>
              {{ formatTimeLong(order?.purchase_date) }}
            </td>
            <td><span class="px-3 py-1 rounded-full text-whiteColor text-xs text-center bg-successColor leading-none"> Success </span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useUserStore } from '@/stores'
import { formatPrice, formatTimeLong } from '@/utils'

export default defineComponent({
  components: {},
  setup() {
    const userStore = useUserStore()

    return {
      userStore,
      formatPrice,
      formatTimeLong
    }
  },
  methods: {
    scrollToTop() {
      const childContent = document.getElementById('child-content')
      if (childContent) {
        childContent.scrollIntoView({ behavior: 'smooth' })
      }
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
