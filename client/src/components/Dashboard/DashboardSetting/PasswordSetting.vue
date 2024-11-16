<template>
  <div>
    <form>
      <div class="pb-4 grid grid-cols-12 gap-4">
        <div class="col-span-12">
          <label for="password" class="block mb-3 text-base text-headingColor font-bold">Password</label>
          <input
            id="password"
            type="text"
            v-model="password"
            class="w-full px-5 py-2 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.password && errors?.password.length > 0">
            <p v-for="(err, index) in errors?.password" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="pb-4 grid grid-cols-12 gap-4">
        <div class="col-span-12">
          <label for="new_password" class="block mb-3 text-base text-headingColor font-bold">New Password</label>
          <input
            id="new_password"
            type="text"
            v-model="newPassword"
            class="w-full px-5 py-2 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.new_password && errors?.new_password.length > 0">
            <p v-for="(err, index) in errors?.new_password" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="pb-4 grid grid-cols-12 gap-4">
        <div class="col-span-12">
          <label for="new_password_confirmation" class="block mb-3 text-base text-headingColor font-bold">Re-Type New Password</label>
          <input
            id="new_password_confirmation"
            type="text"
            v-model="newPasswordConfirmation"
            class="w-full px-5 py-2 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.new_password_confirmation && errors?.new_password_confirmation.length > 0">
            <p v-for="(err, index) in errors?.new_password_confirmation" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="mt-2">
        <GradientButtonV2 :func="onChangePassword" :content="'Change Password'" />
      </div>
    </form>
  </div>
</template>

<script>
import { defineComponent, computed, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { changePassword } from '@/webServices/authorizationService'

import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'
export default defineComponent({
  components: { GradientButtonV2 },
  setup() {
    const userStore = useUserStore()
    const homeStore = useHomeStore()

    const password = ref('')
    const newPassword = ref('')
    const newPasswordConfirmation = ref('')
    const loading = ref(false)
    const errors = ref({})

    const onChangePassword = async () => {
      errors.value = {}
      loading.value = true

      const res = await changePassword({
        password: password.value,
        new_password: newPassword.value,
        new_password_confirmation: newPasswordConfirmation.value
      })

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
        errors.value = res.data.errors
      }

      if (res.success) {
        homeStore.onChangeToast({ show: true, type: 'success', message: 'Password changed Successfully !' })
        password.value = ''
        newPassword.value = ''
        newPasswordConfirmation.value = ''
      }

      loading.value = false
    }

    return {
      password,
      newPassword,
      newPasswordConfirmation,
      loading,
      errors,
      onChangePassword
    }
  }
})
</script>

<style></style>
