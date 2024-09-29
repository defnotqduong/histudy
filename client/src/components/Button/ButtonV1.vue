<template>
  <button>
    <router-link
      :to="{ name: link }"
      class="flex items-center justify-center gap-1 text-sm sm:text-base font-bold text-headingColor cursor-pointer relative transition-all duration-[400ms] after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[2px] after:rounded after:bg-primaryColor hover:text-primaryColor hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-[400ms]"
      >{{ content }}
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
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    content: String,
    link: String
  }
})
</script>

<style></style>
