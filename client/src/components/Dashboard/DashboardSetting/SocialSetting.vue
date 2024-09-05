<template>
  <div>
    <form>
      <div class="pb-4 grid grid-cols-12 gap-4">
        <div class="col-span-12">
          <label for="facebook" class="block mb-3 text-base text-headingColor font-bold">Facebook</label>
          <input
            id="facebook"
            type="text"
            v-model="user.facebook"
            placeholder="https://facebook.com/"
            class="w-full px-5 py-[10px] border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.facebook && errors?.facebook.length > 0">
            <p v-for="(err, index) in errors?.facebook" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="pb-4 grid grid-cols-12 gap-4">
        <div class="col-span-12">
          <label for="instagram" class="block mb-3 text-base text-headingColor font-bold">Instagram</label>
          <input
            id="instagram"
            type="text"
            v-model="user.instagram"
            placeholder="https://instagram.com/"
            class="w-full px-5 py-[10px] border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.instagram && errors?.instagram.length > 0">
            <p v-for="(err, index) in errors?.instagram" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="pb-4 grid grid-cols-12 gap-4">
        <div class="col-span-12">
          <label for="twitter" class="block mb-3 text-base text-headingColor font-bold">Twitter</label>
          <input
            id="twitter"
            type="text"
            v-model="user.twitter"
            placeholder="https://twitter.com/"
            class="w-full px-5 py-[10px] border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.twitter && errors?.twitter.length > 0">
            <p v-for="(err, index) in errors?.twitter" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="pb-4 grid grid-cols-12 gap-4">
        <div class="col-span-12">
          <label for="linkedin" class="block mb-3 text-base text-headingColor font-bold">Linkedin</label>
          <input
            id="linkedin"
            type="text"
            v-model="user.linkedin"
            placeholder="https://linkedin.com/"
            class="w-full px-5 py-[10px] border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.linkedin && errors?.linkedin.length > 0">
            <p v-for="(err, index) in errors?.linkedin" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="mt-2"><GradientButtonV2 :func="updateInfo" :content="'Update Profile'" /></div>
    </form>
  </div>
</template>

<script>
import { defineComponent, computed, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { updateProfile } from '@/webServices/authorizationService'

import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'
export default defineComponent({
  components: { GradientButtonV2 },
  setup() {
    const userStore = useUserStore()
    const homeStore = useHomeStore()

    const user = computed(() => ({ ...userStore.user }))
    const loading = ref(false)
    const errors = ref({})

    const updateInfo = async () => {
      errors.value = {}
      loading.value = true

      const res = await updateProfile(user.value)

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
        errors.value = res.data.errors
      }

      if (res.success) {
        homeStore.onChangeToast({ show: true, type: 'success', message: 'User updated Successfully !' })
        userStore.setUser(res.user)
      }

      loading.value = false
    }

    return {
      loading,
      errors,
      user,
      updateInfo
    }
  }
})
</script>

<style></style>
