<template>
  <div class="noti-container custom-scrollbar">
    <p v-if="userStore.notifications.length === 0" class="p-6 text-sm font-medium italic">No notifications yet</p>
    <ul v-else>
      <li v-for="(noti, index) in userStore.notifications" :key="index">
        <div class="flex items-start justify-start">
          <img :src="noti.sender.avatar" class="w-12 h-12 rounded-full" alt="avatar" />
          <div class="ml-2">
            <p class="line-clamp-3">{{ noti.content }}</p>
            <span class="text-sm text-bodyColor">{{ formatTimeShort(noti.created_at) }}</span>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useUserStore } from '@/stores'
import { formatTimeShort } from '@/utils'
export default defineComponent({
  setup() {
    const userStore = useUserStore()

    return {
      userStore,
      formatTimeShort
    }
  }
})
</script>

<style scoped>
.noti-container {
  @apply text-headingColor;
}

.noti-container ul {
  @apply flex flex-col gap-1 p-4 text-[15px] font-semibold;
}

.noti-container ul li {
  @apply p-2 rounded-md  transition-all duration-300;
}

.noti-container ul li:hover {
  @apply text-primaryColor bg-blackOpacityColor;
}
</style>
