<template>
  <div>
    <form>
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-12">
          <label for="facebook" class="block mb-3 text-sm text-headingColor font-bold">Facebook</label>
          <input
            id="facebook"
            type="text"
            placeholder="https://facebook.com/"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
      </div>
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-12">
          <label for="instagram" class="block mb-3 text-sm text-headingColor font-bold">Instagram</label>
          <input
            id="instagram"
            type="text"
            placeholder="https://instagram.com/"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
      </div>
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-12">
          <label for="twitter" class="block mb-3 text-sm text-headingColor font-bold">Twitter</label>
          <input
            id="twitter"
            type="text"
            placeholder="https://twitter.com/"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
      </div>
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-12">
          <label for="linkedin" class="block mb-3 text-sm text-headingColor font-bold">Linkedin</label>
          <input
            id="linkedin"
            type="text"
            placeholder="https://linkedin.com/"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
      </div>
      <div class="mt-2"><GradientButtonV2 :func="updateInfo" :content="'Update Profile'" /></div>
    </form>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useUserStore } from '@/stores'

import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'
export default defineComponent({
  components: { GradientButtonV2 },
  setup() {
    const userStore = useUserStore()

    const updateInfo = () => {
      alert('update info')
    }

    return {
      userStore,
      updateInfo
    }
  }
})
</script>

<style></style>
