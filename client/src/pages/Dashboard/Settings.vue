<template>
  <div class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">Settings</h4>
    </div>
    <div class="mb-6">
      <ul class="flex items-center justify-start text-headingColor font-bold border-b-2 border-borderColor">
        <li
          v-for="navItem in nav"
          :key="navItem.id"
          @click="setActive(navItem.id)"
          class="px-2 py-2 sm:py-4 sm:px-6 text-sm sm:text-base relative cursor-pointer transition-all duration-300 hover:text-primaryColor after:absolute after:content after:left-0 after:bottom-[-2px] after:w-full after:h-[2px] after:bg-primaryColor after:transition-all after:duration-300"
          :class="navItem.isActive ? 'after:scale-100 text-primaryColor' : 'after:scale-0 text-headingColor'"
        >
          <span>{{ navItem.label }}</span>
        </li>
      </ul>
    </div>
    <ProfileSetting v-if="nav[0].isActive" :user="user" />
    <PasswordSetting v-if="nav[1].isActive" :user="user" />
    <SocialSetting v-if="nav[2].isActive" :user="user" />
  </div>
</template>

<script>
import { defineComponent, ref, reactive, computed } from 'vue'
import { useUserStore } from '@/stores'

import ProfileSetting from '@/components/Dashboard/DashboardSetting/ProfileSetting.vue'
import PasswordSetting from '@/components/Dashboard/DashboardSetting/PasswordSetting.vue'
import SocialSetting from '@/components/Dashboard/DashboardSetting/SocialSetting.vue'

export default defineComponent({
  components: { ProfileSetting, PasswordSetting, SocialSetting },
  setup() {
    const userStore = useUserStore()
    const nav = reactive([
      {
        id: 1,
        label: 'Profile',
        isActive: true
      },
      {
        id: 2,
        label: 'Password',
        isActive: false
      },
      {
        id: 3,
        label: 'Social Share',
        isActive: false
      }
    ])

    const user = computed(() => userStore.user)

    const setActive = id => {
      nav.forEach(item => {
        item.isActive = item.id === id
      })
    }

    return { userStore, user, nav, setActive }
  },
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 0 })
    }
  },
  created() {
    this.scrollToTop()
  }
})
</script>

<style></style>
