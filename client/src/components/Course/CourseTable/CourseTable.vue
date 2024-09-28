<template>
  <table class="table">
    <thead>
      <tr>
        <th>Thumbnail</th>
        <th>Title</th>
        <th>Price</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="course in courses" :key="course.id">
        <td class="pl-0">
          <router-link :to="{ name: 'course-details', params: { slug: course?.slug } }">
            <img :src="course.thumbnail_url" class="w-56 h-36 rounded-md object-cover object-center" alt="course thumbnail"
          /></router-link>
        </td>
        <td>
          <router-link
            :to="{ name: 'course-details', params: { slug: course?.slug } }"
            class="text-headingColor text-xl font-bold hover:text-primaryColor transition-all duration-300"
          >
            {{ course.title }}
          </router-link>
        </td>
        <td class="text-lg font-bold">
          {{ course.price === 0 ? 'Free' : formatPrice(course.price) }}
        </td>
        <td>
          <div class="flex items-center justify-center gap-4">
            <button @click.prevent="purchase(course.id)" class="button pay-btn">Purchase</button>
            <button
              @click.prevent="remove(course.id)"
              class="relative w-9 h-9 flex items-center justify-center group after:absolute after:content after:left-0 after:top-0 after:w-full after:h-full after:opacity-0 after:rounded-full after:scale-[0.8] after:bg-grayLightColor after:transition-all after:duration-[400ms] hover:after:scale-[1.2] hover:after:opacity-100"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1] text-bodyColor w-5 h-5 transition-all duration-[400ms] group-hover:text-primaryColor"
              >
                <g>
                  <path
                    id="Vector"
                    d="M18 18L12 12M12 12L6 6M12 12L18 6M12 12L6 18"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </g>
              </svg>
            </button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { formatPrice } from '@/utils'

export default defineComponent({
  components: {},
  props: {
    courses: Array,
    loading: Boolean,
    remove: Function,
    purchase: Function
  },
  setup() {
    const loading = ref(false)

    return {
      loading,
      formatPrice
    }
  }
})
</script>

<style scoped>
.table thead {
  background-size: 300% 100%;
  @apply bg-gradient03;
}
.table th {
  @apply text-base text-whiteColor font-bold;
}

.table thead tr {
  border-bottom: none;
}

.table tbody tr {
  @apply border-b border-borderColor;
}

.table td {
  padding-top: 24px;
  padding-bottom: 24px;
}

.button.remove-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 8px 16px;
  border-radius: 6px;
  transition: all 0.4s ease-in-out;
}

.button.pay-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 8px 16px;
  background-size: 300% 100%;
  border-radius: 6px;
  transition: all 0.4s ease-in-out;
  @apply text-white bg-gradient03;
}

.button.pay-btn:hover {
  transform: translate3d(0, -2px, 0);
  box-shadow: 0px 15px 30px -2px rgba(0, 0, 0, 0.1);
  background-position: 102% 0;
}
</style>
