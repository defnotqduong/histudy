<template>
  <div>
    <form>
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-12">
          <label for="password" class="block mb-3 text-sm text-headingColor font-bold">Password</label>
          <input
            id="password"
            type="text"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
      </div>
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-12">
          <label for="new_password" class="block mb-3 text-sm text-headingColor font-bold">New Password</label>
          <input
            id="new_password"
            type="text"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
      </div>
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-12">
          <label for="password_confirmation" class="block mb-3 text-sm text-headingColor font-bold">Re-Type New Password</label>
          <input
            id="password_confirmation"
            type="text"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
      </div>
      <div class="mt-2"><GradientButtonV2 :func="updateInfo" :content="'Update Password'" /></div>
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
