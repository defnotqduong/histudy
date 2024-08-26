<template>
  <div class="flex items-center gap-2">
    <button :disabled="!isComplete">{{ chapter?.is_published ? 'Unpublist' : 'Publish' }}</button>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    chapter: Object,
    isComplete: Boolean,
    slug: String,
    id: String,
    fetchData: Function
  },
  setup(props) {}
})
</script>

<style></style>
