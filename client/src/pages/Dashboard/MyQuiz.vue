<template>
  <div id="child-content" class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">My Quiz</h4>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useUserStore } from '@/stores'

export default defineComponent({
  components: {},
  setup() {
    const userStore = useUserStore()

    return {
      userStore
    }
  },
  methods: {
    scrollToTop() {
      const childContent = document.getElementById('child-content')
      if (childContent) {
        childContent.scrollIntoView({ behavior: 'smooth' })
      }
    }
  },
  created() {
    this.scrollToTop()
  }
})
</script>

<style></style>
