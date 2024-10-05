<template>
  <div
    class="side-bar sticky top-24 z-10 p-7 bg-gradient12 shadow-shadow01 rounded-md overflow-hidden after:absolute after:content after:top-[3px] after:left-[3px] after:right-[3px] after:bottom-[3px] after:bg-whiteColor after:z-[-1] after:rounded-md"
  >
    <div class="mb-5">
      <h6 class="text-xs text-headingColor font-extrabold opacity-50 uppercase">WELCOME, {{ userStore.user?.name }}</h6>
    </div>
    <nav>
      <ul class="mb-5">
        <li :class="{ active: isActive('dashboard') }">
          <router-link :to="{ name: 'dashboard' }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="20" height="20" viewBox="0 0 24 24" class="mb-1">
              <path
                d="M12.56,2.171a1,1,0,0,0-1.12,0l-8,5.4A1,1,0,0,0,3,8.4V21a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V8.4a1,1,0,0,0-.44-.829ZM14,20H10V14h4Zm5,0H16V13a1,1,0,0,0-1-1H9a1,1,0,0,0-1,1v7H5V8.932l7-4.725,7,4.725Z"
              />
            </svg>
            <span>Dashboard</span>
          </router-link>
        </li>
        <li :class="{ active: isActive('profile') }">
          <router-link :to="{ name: 'profile' }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="20" height="20" class="mb-1">
              <path
                d="M17.5 21.0001H6.5C5.11929 21.0001 4 19.8808 4 18.5001C4 14.4194 10 14.5001 12 14.5001C14 14.5001 20 14.4194 20 18.5001C20 19.8808 18.8807 21.0001 17.5 21.0001Z"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <span>My Profile</span>
          </router-link>
        </li>
        <li :class="{ active: isActive('enrolled-course') }">
          <router-link :to="{ name: 'enrolled-course' }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="20" height="20">
              <path
                d="M12 10.4V20M12 10.4C12 8.15979 12 7.03969 11.564 6.18404C11.1805 5.43139 10.5686 4.81947 9.81596 4.43597C8.96031 4 7.84021 4 5.6 4H4.6C4.03995 4 3.75992 4 3.54601 4.10899C3.35785 4.20487 3.20487 4.35785 3.10899 4.54601C3 4.75992 3 5.03995 3 5.6V16.4C3 16.9601 3 17.2401 3.10899 17.454C3.20487 17.6422 3.35785 17.7951 3.54601 17.891C3.75992 18 4.03995 18 4.6 18H7.54668C8.08687 18 8.35696 18 8.61814 18.0466C8.84995 18.0879 9.0761 18.1563 9.29191 18.2506C9.53504 18.3567 9.75977 18.5065 10.2092 18.8062L12 20M12 10.4C12 8.15979 12 7.03969 12.436 6.18404C12.8195 5.43139 13.4314 4.81947 14.184 4.43597C15.0397 4 16.1598 4 18.4 4H19.4C19.9601 4 20.2401 4 20.454 4.10899C20.6422 4.20487 20.7951 4.35785 20.891 4.54601C21 4.75992 21 5.03995 21 5.6V16.4C21 16.9601 21 17.2401 20.891 17.454C20.7951 17.6422 20.6422 17.7951 20.454 17.891C20.2401 18 19.9601 18 19.4 18H16.4533C15.9131 18 15.643 18 15.3819 18.0466C15.15 18.0879 14.9239 18.1563 14.7081 18.2506C14.465 18.3567 14.2402 18.5065 13.7908 18.8062L12 20"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <span> Enrolled Courses </span>
          </router-link>
        </li>
        <li :class="{ active: isActive('wishlist') }">
          <router-link :to="{ name: 'wishlist' }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="20" height="20">
              <path
                d="M4.45067 13.9082L11.4033 20.4395C11.6428 20.6644 11.7625 20.7769 11.9037 20.8046C11.9673 20.8171 12.0327 20.8171 12.0963 20.8046C12.2375 20.7769 12.3572 20.6644 12.5967 20.4395L19.5493 13.9082C21.5055 12.0706 21.743 9.0466 20.0978 6.92607L19.7885 6.52734C17.8203 3.99058 13.8696 4.41601 12.4867 7.31365C12.2913 7.72296 11.7087 7.72296 11.5133 7.31365C10.1304 4.41601 6.17972 3.99058 4.21154 6.52735L3.90219 6.92607C2.25695 9.0466 2.4945 12.0706 4.45067 13.9082Z"
                stroke="currentColor"
                stroke-width="2"
              />
            </svg>
            <span>Wishlist</span>
          </router-link>
        </li>
        <li :class="{ active: isActive('my-quiz') }">
          <router-link :to="{ name: 'my-quiz' }">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1024 1024">
              <path d="M130.735 253.626m-66.735 0a66.735 66.735 0 1 0 133.47 0 66.735 66.735 0 1 0-133.47 0Z" fill="currentColor" />
              <path d="M130.735 503.434m-66.735 0a66.735 66.735 0 1 0 133.47 0 66.735 66.735 0 1 0-133.47 0Z" fill="currentColor" />
              <path d="M130.735 770.374m-66.735 0a66.735 66.735 0 1 0 133.47 0 66.735 66.735 0 1 0-133.47 0Z" fill="currentColor" />
              <path
                d="M913.385 283.49H351.807c-16.494 0-29.867-13.373-29.867-29.867s13.373-29.867 29.867-29.867h561.578c16.494 0 29.867 13.373 29.867 29.867s-13.373 29.867-29.867 29.867zM913.385 533.304H351.807c-16.494 0-29.867-13.373-29.867-29.867s13.373-29.867 29.867-29.867h561.578c16.494 0 29.867 13.373 29.867 29.867 0 16.493-13.373 29.867-29.867 29.867zM930.133 800.238H368.564c-16.494 0-29.867-13.373-29.867-29.867s13.373-29.867 29.867-29.867h561.569c16.494 0 29.867 13.373 29.867 29.867s-13.373 29.867-29.867 29.867z"
                fill="currentColor"
              />
            </svg>
            <span>My Quiz Attempts</span>
          </router-link>
        </li>
        <li :class="{ active: isActive('cert') }">
          <router-link :to="{ name: 'cert' }">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <circle cx="12" cy="8" r="7" />
              <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
            </svg>
            <span>Certs</span>
          </router-link>
        </li>
        <li :class="{ active: isActive('order-history') }">
          <router-link :to="{ name: 'order-history' }">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
              <line x1="3" y1="6" x2="21" y2="6" />
              <path d="M16 10a4 4 0 01-8 0" />
            </svg>
            <span>Order History</span>
          </router-link>
        </li>
      </ul>
    </nav>
    <div class="mb-5">
      <h6 class="text-xs text-headingColor font-extrabold opacity-50 uppercase">USER</h6>
      <nav>
        <ul class="mb-5">
          <li :class="{ active: isActive('settings') }">
            <router-link :to="{ name: 'settings' }">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="20" height="20">
                <path
                  d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-miterlimit="10"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M2 12.8799V11.1199C2 10.0799 2.85 9.21994 3.9 9.21994C5.71 9.21994 6.45 7.93994 5.54 6.36994C5.02 5.46994 5.33 4.29994 6.24 3.77994L7.97 2.78994C8.76 2.31994 9.78 2.59994 10.25 3.38994L10.36 3.57994C11.26 5.14994 12.74 5.14994 13.65 3.57994L13.76 3.38994C14.23 2.59994 15.25 2.31994 16.04 2.78994L17.77 3.77994C18.68 4.29994 18.99 5.46994 18.47 6.36994C17.56 7.93994 18.3 9.21994 20.11 9.21994C21.15 9.21994 22.01 10.0699 22.01 11.1199V12.8799C22.01 13.9199 21.16 14.7799 20.11 14.7799C18.3 14.7799 17.56 16.0599 18.47 17.6299C18.99 18.5399 18.68 19.6999 17.77 20.2199L16.04 21.2099C15.25 21.6799 14.23 21.3999 13.76 20.6099L13.65 20.4199C12.75 18.8499 11.27 18.8499 10.36 20.4199L10.25 20.6099C9.78 21.3999 8.76 21.6799 7.97 21.2099L6.24 20.2199C5.33 19.6999 5.02 18.5299 5.54 17.6299C6.45 16.0599 5.71 14.7799 3.9 14.7799C2.85 14.7799 2 13.9199 2 12.8799Z"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-miterlimit="10"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <span>Settings</span>
            </router-link>
          </li>
          <li>
            <button @click.prevent="logout">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none" width="20" height="20">
                <path d="M23.9917 6L6 6L6 42H24" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M33 33L42 24L33 15" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16 23.9917H42" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <span>Logout</span>
            </button>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useUserStore } from '@/stores'
import { logoutUser } from '@/webServices/authorizationService.js'

export default defineComponent({
  setup() {
    const userStore = useUserStore()
    const route = useRoute()
    const router = useRouter()

    const isActive = name => {
      return route.name === name
    }

    const logout = async () => {
      const res = await logoutUser()
      userStore.logout()
      router.push({ name: 'auth-login' })
    }

    return { userStore, route, router, isActive, logout }
  }
})
</script>

<style scoped>
.side-bar nav li {
  padding: 12px 0;
}
.side-bar nav li:not(:first-child) {
  border-top: 1px solid;
  @apply border-borderColor;
}

.side-bar nav li a,
.side-bar nav li button {
  display: flex;
  align-items: center;
  justify-content: start;
  gap: 8px;
  font-weight: 700;
  transition: all 0.4s;
}

.side-bar nav li.active a {
  @apply text-primaryColor;
}

.side-bar nav li:not(.active):hover a {
  transform: translateX(4px);
  @apply text-primaryColor;
}

.side-bar nav li:hover button {
  transform: translateX(4px);
  @apply text-primaryColor;
}
</style>
