<template>
  <button class="button" @click.prevent="handleClick">
    <LoadingV1 v-if="loading" />
    <span v-else>{{ content }}</span>
  </button>
</template>

<script>
import { defineComponent } from 'vue'
import LoadingV1 from '@/components/Loading/LoadingV1.vue'

export default defineComponent({
  props: {
    content: String,
    func: Function,
    loading: {
      type: Boolean,
      default: false
    }
  },
  components: { LoadingV1 },
  methods: {
    handleClick() {
      if (!this.loading) {
        this.func()
      }
    }
  }
})
</script>

<style scoped>
.button {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50px;
  padding: 0 28px;
  font-size: 16px;
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
