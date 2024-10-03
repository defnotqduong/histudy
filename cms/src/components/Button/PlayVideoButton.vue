<template>
  <button class="button" title="Play video">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
      <path
        d="M21.4086 9.35258C23.5305 10.5065 23.5305 13.4935 21.4086 14.6474L8.59662 21.6145C6.53435 22.736 4 21.2763 4 18.9671L4 5.0329C4 2.72368 6.53435 1.26402 8.59661 2.38548L21.4086 9.35258Z"
        fill="currentColor"
      />
    </svg>
  </button>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({})
</script>

<style scoped>
.button {
  position: relative;
  width: 80px;
  height: 80px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 100%;
  @apply bg-whiteColor;
}

.button svg {
  width: 26px;
  height: 26px;
  @apply text-primaryColor;
}

.button::before {
  position: absolute;
  content: '';
  display: block;
  top: 0;
  right: 0;
  z-index: 1;
  bottom: 0;
  left: 0;
  border-radius: 50%;
  border: 1.5px solid;
  animation: ripple 2s linear infinite;
  @apply border-whiteColor;
}

.button::after {
  position: absolute;
  content: '';
  display: block;
  top: 0;
  right: 0;
  z-index: 1;
  bottom: 0;
  left: 0;
  border-radius: 50%;
  border: 1.5px solid;
  animation: ripple 2s linear 1.1s infinite;
  @apply border-whiteColor;
}

@keyframes ripple {
  0% {
    transform: scale(0.8);
    opacity: 1;
  }

  75% {
    transform: scale(1.8);
    opacity: 0.5;
  }
  100% {
    transform: scale(2.2);
    opacity: 0;
  }
}
</style>
