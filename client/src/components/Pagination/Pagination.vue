<template>
  <div class="mt-16">
    <ul class="pagination">
      <li :class="{ disabled: meta.current_page === 1 }">
        <button @click="changePage(meta.current_page - 1)" :disabled="meta.current_page === 1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M15.7071 4.29289C16.0976 4.68342 16.0976 5.31658 15.7071 5.70711L9.41421 12L15.7071 18.2929C16.0976 18.6834 16.0976 19.3166 15.7071 19.7071C15.3166 20.0976 14.6834 20.0976 14.2929 19.7071L7.29289 12.7071C7.10536 12.5196 7 12.2652 7 12C7 11.7348 7.10536 11.4804 7.29289 11.2929L14.2929 4.29289C14.6834 3.90237 15.3166 3.90237 15.7071 4.29289Z"
              fill="currentColor"
            />
          </svg>
        </button>
      </li>
      <li v-if="meta.current_page >= 3">
        <button @click="changePage(1)">1</button>
      </li>
      <li class="disabled" v-if="meta.current_page >= 4">
        <button disabled>...</button>
      </li>
      <li v-if="meta.current_page > 1">
        <button @click="changePage(meta.current_page - 1)">{{ meta.current_page - 1 }}</button>
      </li>
      <li class="active">
        <button disabled>{{ meta.current_page }}</button>
      </li>
      <li v-if="meta.current_page < meta.last_page - 1">
        <button @click="changePage(meta.current_page + 1)">{{ meta.current_page + 1 }}</button>
      </li>
      <li class="disabled" v-if="meta.last_page - meta.current_page >= 3"><button disabled>...</button></li>
      <li v-if="meta.current_page !== meta.last_page">
        <button @click="changePage(meta.last_page)">{{ meta.last_page }}</button>
      </li>
      <li :class="{ disabled: meta.current_page === meta.last_page }">
        <button @click="changePage(meta.current_page + 1)" :disabled="meta.current_page === meta.last_page">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z"
              fill="currentColor"
            />
          </svg>
        </button>
      </li>
    </ul>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    meta: Object,
    links: Object
  },
  emits: ['changePage'],
  setup(props, { emit }) {
    const changePage = page => {
      emit('changePage', page)
    }

    return {
      changePage
    }
  }
})
</script>

<style scoped>
.pagination {
  @apply text-headingColor flex items-center justify-center;
}

.pagination li {
  @apply m-1 sm:m-2;
}

.pagination li button {
  transition: all 0.4s;
  @apply w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 font-semibold bg-whiteColor rounded-md flex items-center justify-center shadow-shadow01;
}

.pagination .disabled {
  @apply pointer-events-none opacity-65;
}

.pagination .active button {
  @apply bg-primaryColor text-whiteColor;
}

.pagination li:hover button {
  @apply bg-primaryColor text-whiteColor;
}
</style>
