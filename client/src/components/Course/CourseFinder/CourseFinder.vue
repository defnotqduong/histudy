<template>
  <div class="relative pt-12 pb-[160px]">
    <div
      class="absolute top-0 left-0 z-[-2] w-full h-full bg-gradient11 after:absolute after:content after:top-0 after:left-0 after:w-full after:h-full after:z-[-1] after:bg-overlay01"
    ></div>
    <div class="container mx-auto px-4">
      <div class="breadcrumbs text-sm text-headingColor">
        <ul>
          <li class="hover:text-primaryColor transition-all duration-300"><router-link :to="{ name: 'home' }">Home</router-link></li>
          <li class="opacity-60">All Courses</li>
        </ul>
      </div>
      <div class="my-6 flex items-center justify-start">
        <h1 class="text-3xl sm:text-4xl xl:text-5xl text-headingColor font-black">All Courses</h1>
        <div
          class="ml-5 px-5 flex items-center justify-center h-12 text-sm text-headingColor font-bold bg-badgeColor shadow-shadow04 rounded-full border-[1px] border-whiteColor"
        >
          <span class="mr-2">🎉</span>
          {{ meta?.total }} Courses
        </div>
      </div>
      <p class="text-base lg:text-lg text-headingColor">Courses that help beginner designers become true unicorns.</p>
      <div class="mt-10">
        <div class="grid grid-cols-12 gap-y-6">
          <div class="col-span-12 lg:col-span-5">
            <span class="text-base text-headingColor"> Showing {{ meta?.from }}-{{ meta?.to }} of {{ meta?.total }} results</span>
          </div>
          <div class="col-span-12 lg:col-span-7">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-start lg:justify-end gap-4">
              <form class="relative">
                <input
                  type="text"
                  v-model="filters.search"
                  placeholder="Search for courses or instructors..."
                  class="sm:min-w-[360px] h-12 pl-5 pr-10 text-whiteColor font-semibold line-clamp-1 bg-transparent border-2 border-whiteColor outline-none rounded-full shadow-shadow02 placeholder:text-whiteColor"
                />
                <button
                  @click.prevent=""
                  class="absolute top-1/2 -translate-y-1/2 right-2 w-8 h-8 flex items-center justify-center group after:absolute after:content after:left-0 after:top-0 after:w-full after:h-full after:opacity-0 after:rounded-full after:scale-[0.8] after:bg-grayLightColor after:transition-all after:duration-[400ms] hover:after:scale-[1.2] hover:after:opacity-100"
                  title="Search"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="text-whiteColor absolute top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 z-[1] w-5 h-5 transition-all duration-[400ms] group-hover:text-primaryColor"
                  >
                    <path
                      d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </button>
              </form>
              <button class="btn-filter" :class="{ active: isShowFilter }" @click="toggleFilter">
                Filter
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M4.2673 6.24223C2.20553 4.40955 3.50184 1 6.26039 1H17.7396C20.4981 1 21.7945 4.40955 19.7327 6.24223L15.3356 10.1507C15.1221 10.3405 15 10.6125 15 10.8981V21.0858C15 22.8676 12.8457 23.7599 11.5858 22.5L9.58578 20.5C9.21071 20.1249 8.99999 19.6162 8.99999 19.0858V10.8981C8.99999 10.6125 8.87785 10.3405 8.66436 10.1507L4.2673 6.24223ZM6.26039 3C5.34088 3 4.90877 4.13652 5.59603 4.74741L9.99309 8.6559C10.6336 9.22521 11 10.0412 11 10.8981V19.0858L13 21.0858V10.8981C13 10.0412 13.3664 9.22521 14.0069 8.6559L18.404 4.74741C19.0912 4.13652 18.6591 3 17.7396 3H6.26039Z"
                    fill="currentColor"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-7 border-t-[1px] border-border02Color" v-show="isShowFilter">
        <div class="pt-8 flex flex-wrap items-end justify-start">
          <div class="p-2 w-[50%] md:flex-1">
            <span class="inline-block mb-2 text-sm text-headingColor font-bold opacity-80 uppercase">Short by</span>
            <select v-model="filters.sort" class="select w-full">
              <option value="">Default</option>
              <option value="latest">Latest</option>
              <option value="popularity">Popularity</option>
              <option value="price_asc">Price: low to high</option>
              <option value="price_desc">Price: high to low</option>
            </select>
          </div>
          <div class="p-2 w-[50%] md:flex-1">
            <span class="inline-block mb-2 text-sm text-headingColor font-bold opacity-80 uppercase">Short by offer</span>
            <select v-model="filters.price" class="select w-full">
              <option :value="null">All</option>
              <option value="free">Free</option>
              <option value="paid">Paid</option>
            </select>
          </div>
          <div class="p-2 w-[50%] md:flex-1">
            <span class="inline-block mb-2 text-sm text-headingColor font-bold opacity-80 uppercase">Short by category</span>
            <select class="select w-full" v-model="filters.category_id" @change="updateCategoryId">
              <option disabled :value="null">Select a category</option>
              <option v-for="category in homeStore.categories" :key="category.id" :value="category.id">{{ category.name }}</option>
            </select>
          </div>
          <div class="p-2">
            <button class="button" @click.prevent="onFilter">Filter</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, watch } from 'vue'
import _ from 'lodash'
import { useHomeStore } from '@/stores'

export default defineComponent({
  components: {},
  props: {
    meta: Object,
    filters: Object,
    isShowFilter: Boolean,
    toggleFilter: Function,
    fetchData: Function
  },
  emits: ['filters-changed'],
  setup(props, { emit }) {
    const homeStore = useHomeStore()

    const filters = ref(props.filters)

    const updateCategoryId = e => {
      filters.value.category_id = e.target.value
    }

    const emitFiltersChanged = () => {
      emit('filters-changed', filters.value)
    }

    const onFilter = () => {
      emitFiltersChanged()
      // props.fetchData()
    }

    const debouncedFetchData = _.debounce(() => {
      onFilter()
    }, 1500)

    watch(
      () => filters.value.search,
      () => {
        debouncedFetchData()
      }
    )

    return {
      filters,
      homeStore,
      updateCategoryId,
      emitFiltersChanged,
      onFilter
    }
  }
})
</script>

<style scoped>
.btn-filter {
  height: 3rem;
  padding: 0 24px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  font-weight: 600;
  border-radius: 9999px;
  transition: all 0.3s ease-in-out;
  @apply text-headingColor bg-whiteColor shadow-shadow05;
}

.btn-filter:hover {
  transform: translate3d(0, -2px, 0);
  @apply bg-primaryColor text-whiteColor;
}

.btn-filter.active {
  transform: translate3d(0, -2px, 0);
  @apply bg-primaryColor text-whiteColor;
}

.select {
  font-size: 16px;
  border: 1px solid rgba(204, 204, 204, 1);
  @apply text-bodyColor bg-whiteColor;
}

.select:focus {
  @apply border-primaryColor outline-none;
}

.button {
  height: 3rem;
  padding: 0 28px;
  font-size: 16px;
  font-weight: 700;
  text-transform: uppercase;
  background-size: 300% 100%;
  border-radius: 6px;
  transition: all 0.4s ease-in-out;
  @apply text-white bg-gradient03;
}

.button:hover {
  transform: translate3d(0, -2px, 0);
  box-shadow: 0px 15px 30px -2px rgba(0, 0, 0, 0.1);
  background-position: 102% 0;
}
</style>
