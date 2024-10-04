<template>
  <header :class="{ 'header-sticky': isHeaderFixed }">
    <div class="py-3">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
          <div class="ml-[-10px]">
            <div class="px-[10px]">
              <router-link :to="{ name: 'home' }">
                <img src="@/assets/images/logo.jpg" class="max-h-[50px] object-cover object-center" alt="Logo" />
              </router-link>
            </div>
          </div>
          <nav class="hidden lg:block">
            <ul class="flex items-center justify-center gap-7">
              <li class="has-child-menu">
                <router-link :to="{ name: 'home' }" class="flex items-center justify-center gap-1">
                  <span>Home</span>
                </router-link>
              </li>
              <li class="has-child-menu">
                <a class="flex items-center justify-center gap-1">
                  <span>Course</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </a>
                <ul class="sub-menu grid grid-cols-2">
                  <li v-for="category in homeStore.categories" :key="category.id" class="col-span-1">
                    <router-link :to="{ name: 'courses', query: { category_id: category.id } }" class="line-clamp-1">
                      {{ category.name }}
                    </router-link>
                  </li>
                </ul>
              </li>
              <li class="has-child-menu">
                <a class="flex items-center justify-center gap-1">
                  <span>Category</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </a>
                <ul class="sub-menu grid grid-cols-2">
                  <li v-for="category in homeStore.categories" :key="category.id" class="col-span-1">
                    <router-link :to="{ name: 'courses', query: { category_id: category.id } }" class="line-clamp-1">
                      {{ category.name }}
                    </router-link>
                  </li>
                </ul>
              </li>
              <li class="has-child-menu">
                <router-link :to="{ name: 'home' }" class="flex items-center justify-center gap-1">
                  <span>News</span>
                </router-link>
              </li>
              <li class="has-child-menu">
                <router-link :to="{ name: 'home' }" class="flex items-center justify-center gap-1">
                  <span>Blog</span>
                </router-link>
              </li>
            </ul>
          </nav>
          <div class="flex items-center justify-center gap-2 mr-[-10px]">
            <div>
              <ul>
                <li>
                  <button
                    @click="onChangeSearchEl"
                    class="relative w-[30px] h-[30px] flex items-center justify-center group after:absolute after:content after:left-0 after:top-0 after:w-full after:h-full after:rounded-full after:bg-grayLightColor after:transition-all after:duration-[400ms] hover:after:scale-[1.2] hover:after:opacity-100"
                    :class="isShowSearchEl ? 'after:opacity-100 after:scale-[1.3]' : 'after:opacity-0 after:scale-[0.8]'"
                    title="Search"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="none"
                      class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1] w-5 h-5 transition-all duration-[400ms] group-hover:text-primaryColor"
                      :class="isShowSearchEl ? 'text-primaryColor' : 'text-headingColor'"
                      v-show="isShowSearchEl"
                    >
                      <g>
                        <path
                          id="Vector"
                          d="M18 18L12 12M12 12L6 6M12 12L18 6M12 12L6 18"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </g>
                    </svg>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="none"
                      class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1] w-5 h-5 text-headingColor transition-all duration-[400ms] group-hover:text-primaryColor"
                      v-show="!isShowSearchEl"
                    >
                      <path
                        d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </button>
                </li>
              </ul>
            </div>
            <template v-if="userStore.user">
              <div class="px-[10px]">
                <ul>
                  <li class="relative text-headingColor text-base font-bold cursor-pointer transitin-all duration-[400ms] hover:text-primaryColor">
                    <button @click.prevent="homeStore.onChangeShowCartSideMenu" class="flex items-center justify-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.5 3m0 0L7 15h11l3-9H5.5z" />
                        <circle cx="8" cy="20" r="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        <circle cx="17" cy="20" r="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                      </svg>
                      <div
                        class="absolute -top-3 -right-5 w-5 h-5 rounded-full bg-primaryColor text-sm text-whiteColor font-semibold flex items-center justify-center"
                      >
                        {{ userStore.cart.length }}
                      </div>
                    </button>
                  </li>
                </ul>
              </div>
              <div class="hidden lg:block w-[1.5px] h-9 bg-borderColor ml-6 mr-2"></div>
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
                      <span class="hidden lg:block mt-1 line-clamp-1">{{ userStore.user.username }}</span>
                    </a>
                    <UserMenu />
                  </li>
                </ul>
              </div>
            </template>
            <template v-else>
              <ButtonV3 :content="'Login'" :func="redirect" class="ml-3" />
            </template>
            <div class="block lg:hidden px-[10px]">
              <input hidden="" class="check-icon" id="check-icon" name="check-icon" type="checkbox" v-model="homeStore.isShowHeaderMenu" />
              <label class="icon-menu" for="check-icon">
                <div class="bar bar--1"></div>
                <div class="bar bar--2"></div>
                <div class="bar bar--3"></div>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="search-container" :class="isShowSearchEl && 'active'">
      <SearchEl :onChangeSearchEl="onChangeSearchEl" />
    </div>
  </header>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'

import SearchEl from '@/components/Search/SearchEl.vue'
import ButtonV3 from '@/components/Button/ButtonV3.vue'
import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'
import UserMenu from '@/components/Header/UserMenu.vue'
export default defineComponent({
  components: { ButtonV3, GradientButtonV2, SearchEl, UserMenu },
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()

    const router = useRouter()

    const isShowSearchEl = ref(false)
    const isHeaderFixed = ref(false)
    const isShowMenu = ref(false)

    const onChangeSearchEl = () => {
      isShowSearchEl.value = !isShowSearchEl.value
    }

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
      isShowSearchEl,
      isShowMenu,
      isHeaderFixed,
      onChangeSearchEl,
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
