<template>
  <button class="button">
    <router-link :to="{ name: link }" class="w-full h-full flex items-center justify-center">
      <span class="text-sm md:text-base">{{ content }}</span>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="icon">
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

<style scoped>
.button {
  position: relative;
  height: 50px;
  padding: 0 20px;
  font-size: 16px;
  font-weight: 700;
  transition: all 0.2s ease;
  @apply text-headingColor;
}

.button:hover {
  @apply text-whiteColor;
}

.button::after {
  position: absolute;
  content: '';
  top: 0;
  left: 0;
  z-index: -1;
  height: 50px;
  width: 50px;
  border-radius: 25px;
  opacity: 0.5;
  transition: all 0.3s ease;
  @apply bg-primaryColor;
}

.button:hover::after {
  opacity: 1;
  width: 100%;
}

.button .icon {
  width: 16px;
  height: 16px;
  margin-left: 10px;
  transform: translateX(-5px);
  transition: all 0.3s ease;
}

.button:hover .icon {
  transform: translateX(0);
}
</style>
