<template>
  <div class="user-menu-list-wrapper">
    <div class="p-4">
      <div class="pb-5 flex items-center justify-start">
        <div class="w-14 h-14 p-[2px] border-2 border-primaryOpacityColor rounded-full mr-2">
          <img :src="userStore.user.avatar" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
        </div>
        <div class="flex-1">
          <h5 class="text-base text-heading font-bold line-clamp-1">{{ userStore.user.username }}</h5>
          <button @click="closeUserMenu">
            <router-link
              :to="{ name: 'profile' }"
              class="flex items-center justify-center gap-1 text-sm font-bold cursor-pointer relative after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[2px] after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-[400ms]"
              :class="`text-primaryColor after:bg-primaryColor`"
              >View Profile
            </router-link>
          </button>
        </div>
      </div>
      <ul>
        <li @click="closeUserMenu">
          <router-link :to="{ name: 'dashboard' }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M12.56,2.171a1,1,0,0,0-1.12,0l-8,5.4A1,1,0,0,0,3,8.4V21a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V8.4a1,1,0,0,0-.44-.829ZM14,20H10V14h4Zm5,0H16V13a1,1,0,0,0-1-1H9a1,1,0,0,0-1,1v7H5V8.932l7-4.725,7,4.725Z"
              />
            </svg>
            <span>Dashboard</span>
          </router-link>
        </li>
        <li @click="closeUserMenu">
          <router-link :to="{ name: 'cart' }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.5 3m0 0L7 15h11l3-9H5.5z" />
              <circle cx="8" cy="20" r="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
              <circle cx="17" cy="20" r="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </svg>
            <span> Cart </span>
          </router-link>
        </li>
        <li @click="closeUserMenu">
          <router-link :to="{ name: 'enrolled-course' }">
            <svg
              xmlns="http://www.w3.org/2000/svg"
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
            <span> Enrolled Courses </span>
          </router-link>
        </li>
        <li @click="closeUserMenu">
          <router-link :to="{ name: 'wishlist' }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
              <path
                d="M4.45067 13.9082L11.4033 20.4395C11.6428 20.6644 11.7625 20.7769 11.9037 20.8046C11.9673 20.8171 12.0327 20.8171 12.0963 20.8046C12.2375 20.7769 12.3572 20.6644 12.5967 20.4395L19.5493 13.9082C21.5055 12.0706 21.743 9.0466 20.0978 6.92607L19.7885 6.52734C17.8203 3.99058 13.8696 4.41601 12.4867 7.31365C12.2913 7.72296 11.7087 7.72296 11.5133 7.31365C10.1304 4.41601 6.17972 3.99058 4.21154 6.52735L3.90219 6.92607C2.25695 9.0466 2.4945 12.0706 4.45067 13.9082Z"
                stroke="currentColor"
                stroke-width="2"
              />
            </svg>
            <span>Wishlist</span>
          </router-link>
        </li>
        <li @click="closeUserMenu">
          <router-link :to="{ name: 'my-quiz' }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
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
        <li @click="closeUserMenu">
          <router-link :to="{ name: 'cert' }">
            <svg
              xmlns="http://www.w3.org/2000/svg"
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
        <li @click="closeUserMenu">
          <router-link :to="{ name: 'order-history' }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
              <path
                d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <span>Order History</span>
          </router-link>
        </li>
      </ul>
      <hr class="h-[1.5px] bg-borderColor my-[10px] -mx-4" />
      <ul>
        <li @click="closeUserMenu">
          <router-link :to="{ name: 'settings' }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
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
        <li @click="closeUserMenu">
          <button @click.prevent="logout">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
              <path d="M23.9917 6L6 6L6 42H24" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M33 33L42 24L33 15" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M16 23.9917H42" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>Logout</span>
          </button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores'
import { logoutUser } from '@/webServices/authorizationService.js'
export default defineComponent({
  props: {
    closeUserMenu: {
      type: Function,
      default: () => {}
    }
  },
  setup() {
    const userStore = useUserStore()
    const router = useRouter()

    const logout = async () => {
      const res = await logoutUser()
      userStore.logout()
      router.push({ name: 'auth-login' })
    }

    return {
      userStore,
      logout
    }
  }
})
</script>

<style scoped>
.has-child-menu {
  position: relative;
}

.has-child-menu > a {
  font-size: 18px;
  font-weight: 700;
  cursor: pointer;
  transition: color 0.3s;
  @apply text-headingColor;
}

.has-child-menu > a > svg {
  width: 14px;
  height: 14px;
  transition: transform 0.3s, color 0.3s 0.1s;
}

.has-child-menu:hover > a {
  @apply text-primaryColor;
}

.has-child-menu:hover > a > svg {
  transform: rotate(180deg);
  @apply text-primaryColor;
}

.sub-menu {
  position: absolute;
  top: 100%;
  left: 0;
  right: auto;
  z-index: 2000;
  visibility: hidden;
  min-width: 560px;
  padding: 12px 0;
  border-radius: 6px;
  background: white;
  background-color: white;
  box-shadow: 0px 6px 30px rgba(207, 208, 210, 0.4);
  border-top: 1px solid rgba(225, 224, 231, 0.3);
  overflow-y: auto;
  clip: rect(0, 200vw, 0, 0);
  opacity: 0;
  transform: translateZ(0);
  transition: clip 0.45s linear, opacity 0.25s linear;
}

.sub-menu li a,
.sub-menu li button,
.user-menu-list-wrapper li a,
.user-menu-list-wrapper li button {
  display: flex;
  align-items: center;
  justify-content: start;
  gap: 4px;
  margin: 2px 10px;
  padding: 4px 12px;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: transform 0.4s;
  @apply bg-whiteColor text-bodyColor;
}

.sub-menu li button,
.user-menu-list-wrapper li button {
  width: 100%;
}

.user-menu-list-wrapper li a,
.user-menu-list-wrapper li button {
  margin: 2px 0;
  font-size: 15px;
  font-weight: 500;
}

.user-menu-list-wrapper li a svg,
.user-menu-list-wrapper li button svg {
  width: 20px;
  height: 20px;
  margin-bottom: 2px;
  margin-right: 4px;
}

.sub-menu li a:hover,
.sub-menu li button:hover,
.user-menu-list-wrapper li a:hover,
.user-menu-list-wrapper li button:hover {
  transform: translateX(4px);
  @apply bg-blackOpacityColor text-primaryColor;
}

.user-menu {
  position: relative;
}

.user-menu-list-wrapper {
  position: absolute;
  top: 100%;
  right: 0;
  left: auto;
  z-index: 2000;
  visibility: hidden;
  background: white;
  min-width: 260px;
  border-radius: 0 0 10px 10px;
  background-color: white;
  box-shadow: 0px 6px 30px rgba(207, 208, 210, 0.4);
  border-top: 1px solid rgba(225, 224, 231, 0.3);
  overflow-y: auto;
  clip: rect(0, 200vw, 0, 0);
  opacity: 0;
  transform: translateZ(0);
  transition: clip 0.45s linear, opacity 0.25s linear;
}

.search-container {
  position: absolute;
  top: 100%;
  right: 0;
  left: auto;
  z-index: 999;
  visibility: visible;
  background: white;
  width: 100%;
  background-color: white;
  border-top: 1px solid rgba(225, 224, 231, 0.3);
  box-shadow: 0px 6px 34px rgba(215, 216, 222, 0.4);
  clip: rect(0, 200vw, 0, 0);
  opacity: 0;
  transform: translateZ(0);
  transition: clip 0.55s linear, opacity 0.2s linear;
}

.has-child-menu:hover .sub-menu,
.user-menu:hover .user-menu-list-wrapper {
  top: 100%;
  visibility: visible;
  opacity: 1;
  clip: rect(0, 100vw, 200vh, -20px);
}

.search-container.active {
  top: 100%;
  visibility: visible;
  opacity: 1;
  clip: rect(0, 100vw, 200vh, -20px);
}

@keyframes stickySlideDown {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}
</style>
