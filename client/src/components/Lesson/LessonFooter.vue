<template>
  <div class="py-2 bg-extraColor border-t-[1px] border-borderColor">
    <div class="flex items-center justify-center gap-4">
      <PrevButton class="h-10" :content="'Previous'" :func="prev" />
      <NextButton class="h-10" :content="'Next'" :func="next" />
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import NextButton from '@/components/Button/NextButton.vue'
import PrevButton from '@/components/Button/PrevButton.vue'

export default defineComponent({
  components: { NextButton, PrevButton },
  setup() {
    const next = () => {
      alert('next')
    }

    const prev = () => {
      alert('preve')
    }

    return {
      next,
      prev
    }
  }
})
</script>

<style></style>
