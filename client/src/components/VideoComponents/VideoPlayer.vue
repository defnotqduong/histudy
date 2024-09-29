<template>
  <iframe
    width="700"
    height="500"
    :src="url"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen
    class="rounded-md"
  ></iframe>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    url: String
  }
})
</script>

<style></style>
