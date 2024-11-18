<template>
  <div class="container mx-auto overflow-hidden">
    <div class="h-screen grid grid-cols-2">
      <div class="col-span-1 py-10 px-16">
        <router-link :to="{ name: 'home' }" class="text-3xl text-headingColor font-extrabold" :style="{ fontFamily: 'Moonkids' }">HiStudy</router-link>
      </div>
      <div class="col-span-1 py-14 px-20">
        <h2 class="mt-8 text-headingColor text-3xl font-extrabold">Forgot Password?</h2>
        <p class="mt-10 pb-6">Enter the email address you used when you joined and we’ll send you instructions to reset your password.</p>
        <form class="form">
          <div class="input-group">
            <input type="text" name="email" id="email" v-model="email" placeholder="Email" autocomplete="email" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="absolute top-1/2 left-2 -translate-y-1/2 w-5 h-5">
              <path
                d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7"
                stroke="#19233550"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <rect x="3" y="5" width="18" height="14" rx="2" stroke="#19233550" stroke-width="1.5" stroke-linecap="round" />
            </svg>
          </div>
          <div v-if="errors?.email && errors?.email.length > 0">
            <p v-for="(err, index) in errors?.email" :key="index" class="mt-2 text-sm text-red-500">{{ err }}</p>
          </div>
          <div class="mt-6"></div>
          <div class="sign">
            <GradientButtonV2 :content="'Send reset instructions'" :func="forgot" :loading="loading" />
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, reactive, ref, toRefs } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores'
import { forgotPassword } from '@/webServices/authorizationService'

import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'

export default defineComponent({
  components: { GradientButtonV2 },
  setup() {
    const router = useRouter()
    const userStore = useUserStore()

    const email = ref(null)
    const loading = ref(false)
    const errors = ref({})

    const forgot = async () => {
      loading.value = true
      errors.value = {}

      if (!email.value) {
        errors.value.email = errors.value.email || []
        errors.value.email.push('Email is required')
      } else if (!/\S+@\S+\.\S+/.test(email.value)) {
        errors.value.email = errors.value.email || []
        errors.value.email.push('Email format is invalid')
      }

      if (Object.keys(errors.value).length > 0) {
        loading.value = false
        return
      }

      const res = await forgotPassword({ email: email.value })

      if (!res.success) {
        errors.value = res.data.errors
        loading.value = false
        return
      }

      if (res.success) router.push({ name: 'auth-login' })
    }

    return {
      email,
      loading,
      errors,
      forgot
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
