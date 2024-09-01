<template>
  <button class="button" @click.prevent="func">
    <span class="btn-icon text-sm md:text-base">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M11.7071 4.29289C12.0976 4.68342 12.0976 5.31658 11.7071 5.70711L6.41421 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H6.41421L11.7071 18.2929C12.0976 18.6834 12.0976 19.3166 11.7071 19.7071C11.3166 20.0976 10.6834 20.0976 10.2929 19.7071L3.29289 12.7071C3.10536 12.5196 3 12.2652 3 12C3 11.7348 3.10536 11.4804 3.29289 11.2929L10.2929 4.29289C10.6834 3.90237 11.3166 3.90237 11.7071 4.29289Z"
          fill="currentColor"
        />
      </svg>
    </span>
    <span class="btn-text">
      {{ content }}
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
  font-weight: 700;
  border-radius: 6px;
  transition: all 0.3s ease-in-out;
  @apply text-primaryColor bg-primaryOpacityColor;
}

.button:hover {
  transform: translate3d(0, -2px, 0);
  box-shadow: 0px 15px 30px -2px rgba(0, 0, 0, 0.1);
  @apply text-whiteColor bg-primaryColor;
}

.button .btn-text {
  transform: translateX(-8px);
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
  transform: translateX(-8px);
}
</style>
