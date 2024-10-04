<template>
  <header :class="{ 'header-sticky': isHeaderFixed }">
    <div class="py-3">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
          <div class="ml-[-10px]">
            <div class="px-[10px]">
              <router-link :to="{ name: 'dashboard' }">
                <img src="@/assets/images/logo.jpg" class="max-h-10 object-cover object-center" alt="Logo" />
              </router-link>
            </div>
          </div>
          <div class="flex items-center justify-center gap-2 mr-[-10px]">
            <div class="px-[10px]">
              <ul>
                <li class="user-menu">
                  <a
                    class="flex items-center justify-center gap-2 text-headingColor text-base font-bold cursor-pointer transitin-all duration-[400ms] hover:text-primaryColor"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
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
                    <span class="hidden lg:block mt-1 line-clamp-1">Quang Dương</span>
                  </a>
                  <UserMenu />
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'

import UserMenu from '@/components/Header/UserMenu.vue'

export default defineComponent({
  components: { UserMenu },
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()

    const router = useRouter()

    const isHeaderFixed = ref(false)

    const handleScroll = () => {
      if (window.scrollY > 100) {
        isHeaderFixed.value = true
      } else {
        isHeaderFixed.value = false
      }
    }

    const redirect = () => {
      router.push({ name: 'auth-login' })
    }

    return {
      homeStore,
      userStore,
      isHeaderFixed,
      handleScroll,
      redirect
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll)
  },
  unmounted() {
    window.removeEventListener('scroll', this.handleScroll)
  }
})
</script>

<style scoped>
header {
  position: relative;
  box-shadow: 0 20px 34px rgba(0, 0, 0, 0.05);
  @apply bg-whiteColor;
}

header.header-sticky {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 9002;
  animation: stickySlideDown 0.65s cubic-bezier(0.23, 1, 0.32, 1) both;
}

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
  min-width: 200px;
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

.icon-menu {
  --gap: 5px;
  --height-bar: 2px;
  --pos-y-bar-one: 0;
  --pos-y-bar-three: 0;
  --scale-bar: 1;
  --rotate-bar-one: 0;
  --rotate-bar-three: 0;
  width: 20px;
  display: flex;
  flex-direction: column;
  gap: var(--gap);
  cursor: pointer;
  position: relative;
}

.bar {
  position: relative;
  height: var(--height-bar);
  width: 100%;
  border-radius: 0.5rem;
  @apply bg-headingColor;
}

.bar--1 {
  top: var(--pos-y-bar-one);
  transform: rotate(var(--rotate-bar-one));
  transition: top 200ms 100ms, transform 100ms;
}

.bar--2 {
  transform: scaleX(var(--scale-bar));
  transition: transform 150ms 100ms;
}

.bar--3 {
  bottom: var(--pos-y-bar-three);
  transform: rotate(var(--rotate-bar-three));
  transition: bottom 200ms 100ms, transform 100ms;
}

.check-icon:checked + .icon-menu > .bar--1 {
  transition: top 200ms, transform 200ms 100ms;
}

.check-icon:checked + .icon-menu > .bar--3 {
  transition: bottom 200ms, transform 200ms 100ms;
}

.check-icon:checked + .icon-menu {
  --pos-y-bar-one: calc(var(--gap) + var(--height-bar));
  --pos-y-bar-three: calc(var(--gap) + var(--height-bar));
  --scale-bar: 0;
  --rotate-bar-one: 45deg;
  --rotate-bar-three: -45deg;
}

.check-icon:checked + .icon-menu .bar {
  @apply bg-primaryColor;
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
