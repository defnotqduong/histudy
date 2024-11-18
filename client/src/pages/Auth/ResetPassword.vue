<template>
  <div class="container mx-auto overflow-hidden">
    <div class="h-screen grid grid-cols-2">
      <div class="col-span-1 py-10 px-16">
        <router-link :to="{ name: 'home' }" class="text-3xl text-headingColor font-extrabold" :style="{ fontFamily: 'Moonkids' }">HiStudy</router-link>
      </div>
      <div class="col-span-1 py-14 px-20">
        <h2 class="mt-8 text-headingColor text-3xl font-extrabold">Reset your Password</h2>
        <p class="mt-10 pb-6">Enter your new password below to reset your account. Please ensure that the password is strong and not easily guessable.</p>
        <form class="form">
          <div class="input-group">
            <input
              :type="isShowPassword ? 'text' : 'password'"
              name="password"
              id="password"
              v-model="password"
              placeholder="Password"
              autocomplete="new-password"
            />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="absolute top-1/2 left-2 -translate-y-1/2 w-5 h-5">
              <path
                d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                stroke="#19233550"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <button @click.prevent="changeShowPassword" class="absolute top-1/2 right-3 -translate-y-1/2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="#19233550" viewBox="0 -64 640 640" class="w-4 h-4" v-show="!isShowPassword">
                <path
                  d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"
                />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" fill="#19233550" viewBox="0 -32 576 576" class="w-4 h-4" v-show="isShowPassword">
                <path
                  d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"
                />
              </svg>
            </button>
          </div>
          <div v-if="errors?.password && errors?.password.length > 0">
            <p v-for="(err, index) in errors?.password" :key="index" class="mt-2 text-sm text-red-500">{{ err }}</p>
          </div>
          <div class="mt-6"></div>
          <div class="sign">
            <GradientButtonV2 :content="'Reset password'" :func="reset" :loading="loading" />
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useUserStore, useHomeStore } from '@/stores'
import { checkPasswordResetToken, resetPassword } from '@/webServices/authorizationService'

import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'
export default defineComponent({
  components: { GradientButtonV2 },
  setup() {
    const router = useRouter()
    const route = useRoute()

    const userStore = useUserStore()
    const homeStore = useHomeStore()

    const password = ref(null)
    const loading = ref(false)
    const errors = ref({})

    const changeShowPassword = () => {
      isShowPassword.value = !isShowPassword.value
    }

    const isShowPassword = ref(false)

    const checkToken = async () => {
      const token = encodeURIComponent(route.query.token)
      const res = await checkPasswordResetToken({ token: token })
      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'The token is invalid or has expired' })
        router.push({ name: 'auth-forgot-password' })
      }
    }

    const reset = async () => {
      loading.value = true
      errors.value = {}

      const token = encodeURIComponent(route.query.token)

      const res = await resetPassword({
        token: token,
        password: password.value
      })

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
        errors.value = res.data.errors
        loading.value = false
        return
      }

      if (res.success) {
        homeStore.onChangeToast({ show: true, type: 'success', message: 'Your password has been reset successfully!' })
        router.push({ name: 'auth-login' })
      }
    }

    onMounted(() => {
      checkToken()
    })

    return {
      password,
      loading,
      errors,
      isShowPassword,
      changeShowPassword,
      reset
    }
  }
})
</script>

<style scoped>
.social-button {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  padding: 6px;
  width: 120px;
  font-size: 14px;
  font-weight: 800;
  @apply text-headingColor;
  border: 1px solid;
  @apply border-borderColor;
  border-radius: 6px;
}

.social-button svg {
  width: 20px;
  height: 20px;
}

.line {
  height: 1px;
  flex: 1 1 0%;
  @apply bg-headingOpacityColor;
}

.form {
  margin-top: 1.5rem;
}

.input-group {
  margin-top: 1rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  position: relative;
}

.input-group input {
  width: 100%;
  border-radius: 0.375rem;
  border: 1.5px solid;
  outline: 0;
  padding: 0.5rem 1rem 0.5rem 2rem;
  @apply border-borderColor text-headingColor;
}

.input-group input:focus {
  @apply border-primaryColor;
}

.forgot,
.remember {
  display: flex;
  justify-content: flex-end;
  gap: 6px;
  font-size: 0.75rem;
  line-height: 1rem;
}

.remember {
  font-weight: 500;
  @apply text-bodyColor;
}

.forgot a,
.link a {
  text-decoration: none;
  font-size: 14px;
  font-weight: 700;
  @apply text-primaryColor;
}

.sign {
  display: block;
  width: 100%;
}

.sign button {
  width: 100%;
}

.link {
  margin-top: 1rem;
  text-align: center;
  font-size: 0.75rem;
  line-height: 1rem;
  text-decoration: none;
  @apply text-bodyColor;
}
</style>
