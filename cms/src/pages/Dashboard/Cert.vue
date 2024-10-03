<template>
  <div id="child-content" class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">Certificate</h4>
    </div>
    <div v-if="userStore.certs.length === 0" class="mt-4 ml-6 italic">No Certificates yet</div>
    <div v-else class="grid grid-cols-12 gap-2 sm:gap-4">
      <div v-for="cert in userStore.certs" :key="cert.id" class="col-span-12 sm:col-span-6 lg:col-span-4">{{ cert?.name }}</div>
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
