<template>
  <div>
    <div
      class="fixed top-0 left-0 right-0 bottom-0 bg-overlayColor backdrop-blur z-[9999] cursor-pointer transition-all duration-[350ms]"
      :class="homeStore.isShowHeaderMenu ? 'opacity-100 visible' : 'opacity-0 invisible'"
      @click="handleClick"
    ></div>
    <div class="side-bar-menu w-full sm:w-[60%]" :class="{ 'side-menu-active': homeStore.isShowHeaderMenu }">
      <div class="h-full py-10 px-10">
        <div class="flex items-center justify-between">
          <div>
            <img src="@/assets/images/logo.jpg" class="max-h-[50px] object-cover object-center" alt="Logo" />
          </div>
          <CloseButton :color="'blackColor'" :func="handleClick" />
        </div>
        <div class="py-6">
          <div class="pb-4 mb-4 border-b border-borderColor">
            <p class="text-sm my-5 pr-[10%] md:pr-[20%]">Histudy offers courses for all ages to learn new skills and advance careers.</p>
            <ul class="flex items-center justify-start gap-2">
              <li>
                <a
                  href=""
                  class="text-bodyColor text-xs lg:text-sm font-medium flex items-center justify-center gap-1 hover:text-primaryColor transition-all duration-300"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                    <path
                      d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7"
                      stroke="currentColor"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                  </svg>
                  <span>quangduongsayhi@gmail.com</span></a
                >
              </li>
              <li>
                <a
                  href=""
                  class="text-bodyColor text-xs lg:text-sm font-medium flex items-center justify-center gap-1 hover:text-primaryColor transition-all duration-300"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                    <path
                      d="M14.3308 15.9402L15.6608 14.6101C15.8655 14.403 16.1092 14.2384 16.3778 14.1262C16.6465 14.014 16.9347 13.9563 17.2258 13.9563C17.517 13.9563 17.8052 14.014 18.0739 14.1262C18.3425 14.2384 18.5862 14.403 18.7908 14.6101L20.3508 16.1702C20.5579 16.3748 20.7224 16.6183 20.8346 16.887C20.9468 17.1556 21.0046 17.444 21.0046 17.7351C21.0046 18.0263 20.9468 18.3146 20.8346 18.5833C20.7224 18.8519 20.5579 19.0954 20.3508 19.3L19.6408 20.02C19.1516 20.514 18.5189 20.841 17.8329 20.9541C17.1469 21.0672 16.4427 20.9609 15.8208 20.6501C10.4691 17.8952 6.11008 13.5396 3.35083 8.19019C3.03976 7.56761 2.93414 6.86242 3.04914 6.17603C3.16414 5.48963 3.49384 4.85731 3.99085 4.37012L4.70081 3.65015C5.11674 3.23673 5.67937 3.00464 6.26581 3.00464C6.85225 3.00464 7.41488 3.23673 7.83081 3.65015L9.40082 5.22021C9.81424 5.63615 10.0463 6.19871 10.0463 6.78516C10.0463 7.3716 9.81424 7.93416 9.40082 8.3501L8.0708 9.68018C8.95021 10.8697 9.91617 11.9926 10.9608 13.04C11.9994 14.0804 13.116 15.04 14.3008 15.9102L14.3308 15.9402Z"
                      stroke="currentColor"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  <span>03 7374 5152</span></a
                >
              </li>
            </ul>
          </div>
          <nav class="mt-4">
            <ul class="flex flex-col">
              <li class="py-2 font-semibold text-headingColor">
                <router-link :to="{ name: 'home' }">
                  <span>Home</span>
                </router-link>
              </li>
              <li class="py-2 font-semibold text-headingColor border-t border-borderColor">
                <div class="collapse">
                  <input type="checkbox" class="peer min-h-0" />
                  <div class="collapse-title p-0 min-h-0 relative">
                    Courses
                    <span class="absolute top-1/2 -translate-y-1/2 right-0">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg
                    ></span>
                  </div>
                  <div class="collapse-content">
                    <ul class="pl-2 mt-2 flex flex-col gap-2">
                      <li v-for="category in homeStore.categories" :key="category?.id">
                        <router-link :to="{ name: 'courses', query: { category_id: category.id } }" class="line-clamp-1">
                          {{ category.name }}
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="py-2 font-semibold text-headingColor border-t border-borderColor">
                <div class="collapse">
                  <input type="checkbox" class="peer min-h-0" />
                  <div class="collapse-title p-0 min-h-0 relative">
                    Categories
                    <span class="absolute top-1/2 -translate-y-1/2 right-0">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg
                    ></span>
                  </div>
                  <div class="collapse-content">
                    <ul class="pl-2 mt-2 flex flex-col gap-2">
                      <li v-for="category in homeStore.categories" :key="category?.id">
                        <router-link :to="{ name: 'courses', query: { category_id: category.id } }" class="line-clamp-1">
                          {{ category.name }}
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="py-2 font-semibold text-headingColor border-t border-borderColor">
                <router-link :to="{ name: 'home' }">
                  <span>News</span>
                </router-link>
              </li>
              <li class="py-2 font-semibold text-headingColor border-t border-borderColor">
                <router-link :to="{ name: 'home' }">
                  <span>Blog</span>
                </router-link>
              </li>
            </ul>
          </nav>
          <div class="mt-4 pb-6">
            <div class="mb-4 pb-2 text-xs font-bold uppercase border-b border-borderColor">Find with us</div>
            <SocialListV2 />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useHomeStore, useUserStore } from '@/stores'

import CloseButton from '@/components/Button/CloseButton.vue'
import SocialListV2 from '@/components/SocialList/SocialListV2.vue'

export default defineComponent({
  components: { CloseButton, SocialListV2 },
  props: {},
  setup(props) {
    const homeStore = useHomeStore()
    const userStore = useUserStore()

    const handleClick = () => {
      homeStore.onChangeShowHeaderMenu()
    }

    return { homeStore, userStore, handleClick }
  }
})
</script>

<style scoped>
.side-bar-menu {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  z-index: 10000;
  transform: translateX(-100%);
  overflow-y: auto;
  overscroll-behavior: contain;
  transition: transform 0.85s cubic-bezier(0.23, 1, 0.32, 1);
  @apply bg-whiteColor;
}

.side-bar-menu.side-menu-active {
  transform: translateX(0);
}
</style>
