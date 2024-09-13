<template>
  <button class="button text-sm md:text-base" @click.prevent="func" :disabled="loading" :class="{ 'opacity-70': loading }">
    {{ content }}
  </button>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  props: {
    content: String,
    func: Function,
    loading: {
      type: Boolean,
      default: false
    }
  },
  components: {},
  methods: {}
})
</script>

<style scoped>
.button {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50px;
  padding: 0 28px;
  font-weight: 600;
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
