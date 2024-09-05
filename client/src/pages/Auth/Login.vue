<template>
  <div class="container mx-auto overflow-hidden">
    <div class="h-screen grid grid-cols-2">
      <div class="col-span-1 py-10 px-16">
        <router-link :to="{ name: 'home' }" class="text-3xl text-headingColor font-extrabold" :style="{ fontFamily: 'Moonkids' }">HiStudy</router-link>
      </div>
      <div class="col-span-1 py-10 px-24">
        <h2 class="mt-8 text-center text-headingColor text-3xl font-extrabold">Login to your Account</h2>
        <p class="mt-1 text-center text-bodyColor text-sm">Welcome here again! Select method to log in</p>
        <ul class="my-6 flex items-center justify-center gap-4">
          <li>
            <button class="social-button">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none">
                <path
                  fill="#4285F4"
                  d="M14.9 8.161c0-.476-.039-.954-.121-1.422h-6.64v2.695h3.802a3.24 3.24 0 01-1.407 2.127v1.75h2.269c1.332-1.22 2.097-3.02 2.097-5.15z"
                />
                <path
                  fill="#34A853"
                  d="M8.14 15c1.898 0 3.499-.62 4.665-1.69l-2.268-1.749c-.631.427-1.446.669-2.395.669-1.836 0-3.393-1.232-3.952-2.888H1.85v1.803A7.044 7.044 0 008.14 15z"
                />
                <path fill="#FBBC04" d="M4.187 9.342a4.17 4.17 0 010-2.68V4.859H1.849a6.97 6.97 0 000 6.286l2.338-1.803z" />
                <path
                  fill="#EA4335"
                  d="M8.14 3.77a3.837 3.837 0 012.7 1.05l2.01-1.999a6.786 6.786 0 00-4.71-1.82 7.042 7.042 0 00-6.29 3.858L4.186 6.66c.556-1.658 2.116-2.89 3.952-2.89z"
                />
              </svg>
              Google
            </button>
          </li>
          <li>
            <button class="social-button">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none">
                <path
                  fill="#1877F2"
                  d="M15 8a7 7 0 00-7-7 7 7 0 00-1.094 13.915v-4.892H5.13V8h1.777V6.458c0-1.754 1.045-2.724 2.644-2.724.766 0 1.567.137 1.567.137v1.723h-.883c-.87 0-1.14.54-1.14 1.093V8h1.941l-.31 2.023H9.094v4.892A7.001 7.001 0 0015 8z"
                />
                <path
                  fill="#ffffff"
                  d="M10.725 10.023L11.035 8H9.094V6.687c0-.553.27-1.093 1.14-1.093h.883V3.87s-.801-.137-1.567-.137c-1.6 0-2.644.97-2.644 2.724V8H5.13v2.023h1.777v4.892a7.037 7.037 0 002.188 0v-4.892h1.63z"
                />
              </svg>
              Facebook
            </button>
          </li>
        </ul>
        <div class="flex items-center justify-center">
          <div class="line"></div>
          <div class="px-2 text-xs text-bodyColor">or continue with email</div>
          <div class="line"></div>
        </div>
        <form class="form">
          <div class="input-group">
            <input type="text" name="email" id="email" v-model="email" placeholder="Email" />
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
            <p v-for="(err, index) in errors?.email" :key="index" class="mt-2 text-red-500">{{ err }}</p>
          </div>
          <div class="input-group">
            <input :type="isShowPassword ? 'text' : 'password'" name="password" id="password" v-model="password" placeholder="Password" />
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
            <p v-for="(err, index) in errors?.password" :key="index" class="mt-2 text-red-500">{{ err }}</p>
          </div>
          <div class="flex items-center justify-between mt-4 mb-6">
            <div class="remember"><Checkbox />Remember me</div>
            <div class="forgot">
              <a href="#">Forgot Password ?</a>
            </div>
          </div>
          <div class="sign">
            <GradientButtonV2 :content="'Log in'" :func="login" :loading="loading" />
          </div>
        </form>
        <p class="link">
          Don't have an account?
          <router-link :to="{ name: 'auth-register' }" rel="noopener noreferrer" href="#" class="">Create an account</router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, reactive, ref, toRefs } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores'
import { loginUser, getUserProfile } from '@/webServices/authorizationService'
import { getAuthoredCourses, getPurchasedCourses } from '@/webServices/courseService'
import { getCart } from '@/webServices/cartService'
import { getWishlist } from '@/webServices/wishlistService'

import Checkbox from '@/components/Checkbox/Checkbox.vue'
import GradientButtonV1 from '@/components/Button/GradientButtonV1.vue'
import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'

export default defineComponent({
  components: { Checkbox, GradientButtonV1, GradientButtonV2 },
  setup() {
    const router = useRouter()
    const userStore = useUserStore()

    const user = reactive({
      email: '',
      password: ''
    })

    const errors = ref({})
    const loading = ref(false)
    const isShowPassword = ref(false)

    const login = async () => {
      if (loading.value) return

      loading.value = true
      errors.value = {}

      if (!user.email) {
        errors.value.email = errors.value.email || []
        errors.value.email.push('Email is required')
      } else if (!/\S+@\S+\.\S+/.test(user.email)) {
        errors.value.email = errors.value.email || []
        errors.value.email.push('Email format is invalid')
      }

      if (!user.password) {
        errors.value.password = errors.value.password || []
        errors.value.password.push('Password is required')
      } else if (user.password.length < 5) {
        errors.value.password = errors.value.password || []
        errors.value.password.push('Password must be at least 5 characters')
      }

      if (Object.keys(errors.value).length > 0) {
        loading.value = false
        return
      }

      const res = await loginUser({
        email: user.email,
        password: user.password
      })

      if (!res.success) {
        errors.value = res.data.errors
        loading.value = false
        return
      }

      if (res.success) {
        userStore.login(res.data.access_token, res.data.refresh_token)

        const userPromise = Promise.all([getUserProfile(), getAuthoredCourses(), getPurchasedCourses(), getCart(), getWishlist()]).then(
          ([profile, authoredCourses, purchasedCourses, cart, wishlist]) => ({
            success: true,
            user: profile.user,
            courses: authoredCourses.courses,
            purchased_courses: purchasedCourses.courses,
            cart: cart.cart,
            wishlist: wishlist.wishlist
          })
        )

        const [userData] = await Promise.all([userPromise])

        if (userData?.success) {
          userStore.setUser(userData.user)
          userStore.setInstructorCourses(userData.courses.courses)
          userStore.setEnrolledCourses(userData.purchased_courses.courses)
          userStore.setCart(userData.cart.courses)
          userStore.setWishlist(userData.wishlist.courses)
        }

        router.push({ name: 'home' })
      }
    }

    return {
      ...toRefs(user),
      isShowPassword,
      errors,
      loading,
      login
    }
  },
  methods: {
    changeShowPassword() {
      this.isShowPassword = !this.isShowPassword
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
  @apply border-borderColor;
  outline: 0;
  padding: 0.5rem 1rem 0.5rem 2rem;
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
