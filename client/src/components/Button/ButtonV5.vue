<template>
  <button class="button" @click.prevent="func">
    <span class="btn-text">
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
  padding: 0 24px;
  font-size: 16px;
  font-weight: 700;
  border: 2px solid;
  border-radius: 6px;
  transition: all 0.3s ease-in-out;
  @apply text-headingColor bg-whiteColor border-borderColor;
}

.button:hover {
  transform: translate3d(0, -2px, 0);
  box-shadow: 0px 15px 30px -2px rgba(0, 0, 0, 0.1);
  @apply text-whiteColor bg-primaryColor border-primaryColor;
}

.button .btn-text {
  transform: translateX(8px);
  transition: transform 0.3s;
}

.button .btn-icon {
  opacity: 0;
  display: inline-block;
  transition-delay: 0.05s;
  transition: transform 0.3s;
}

.button:hover .btn-text {
  transform: translateX(0px);
}

.button:hover .btn-icon {
  opacity: 1;
  transform: translateX(8px);
}
</style>
