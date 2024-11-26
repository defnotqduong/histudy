<template>
  <div>
    <button @click="goBack" class="text-red-500">Back to learning control</button>
    Course Completed
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useRouter } from 'vue-router'
export default defineComponent({
  setup() {
    const router = useRouter()

    const goBack = () => {
      router.back()
    }
    return { goBack }
  }
})
</script>

<style></style>
