<template>
  <button class="button px-2 md:px-6" @click.prevent="func">
    <span class="btn-text text-sm md:text-base">
      {{ content }}
    </span>
    <span class="btn-icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
          fill="currentColor"
        />
      </svg>
    </span>
    <span class="btn-icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
          fill="currentColor"
        />
      </svg>
    </span>
  </button>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    content: String,
    func: Function
  }
})
</script>

<style scoped>
.button {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 44px;
  font-size: 16px;
  font-weight: 600;
  background-size: 300% 100%;
  border-radius: 6px;
  transition: all 0.4s ease-in-out;
  @apply text-white bg-primaryColor;
}

.button:hover {
  box-shadow: 0px 15px 30px -2px rgba(0, 0, 0, 0.1);
  @apply bg-secondaryColor;
}

.button .btn-text {
  transform: translateX(-6px);
  transition: transform 0.6s cubic-bezier(0.1, 0.75, 0.25, 1) 0.125s;
}

.button .btn-icon {
  padding-left: 6px;
  display: inline-block;
  transform: translateX(-6px);
  transition: opacity 0.4s 0.25s, transform 0.6s 0.25s;
  transition-timing-function: cubic-bezier(0.1, 0.75, 0.25, 1);
}

.button .btn-icon + .btn-icon {
  padding-left: 0;
  opacity: 0;
  transform: translateX(-6px);
  transition-delay: 0s;
  order: -2;
}

.button:hover .btn-text {
  transition-delay: 0.1s;
  transform: translateX(12px);
}

.button:hover .btn-icon {
  opacity: 0;
  transition-delay: 0s;
  transform: translateX(10px);
}

.button:hover .btn-icon + .btn-icon {
  opacity: 1;
  transform: translateX(6px);
  transition-delay: 0.225s;
}
</style>
