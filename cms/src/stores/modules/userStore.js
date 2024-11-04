import { defineStore } from 'pinia'
import { USER_STORE } from '@/configs/storeTypes'
import { removeUserStore, removeRefreshUserStore, localEnUserStore, localEnRefreshUserStore } from '@/helpers/localStorageHelper'

export const useUserStore = defineStore(USER_STORE, {
  state: () => ({
    user: null,
    notifications: []
  }),
  actions: {
    login(accToken, refToken) {
      localEnUserStore(accToken)
      localEnRefreshUserStore(refToken)
    },

    logout() {
      removeUserStore()
      removeRefreshUserStore()
      this.user = null
      this.notifications = []
    },
    setUser(user) {
      this.user = user
    },
    setNotification(notis) {
      this.notifications = [...notis, ...this.notifications]
    }
  }
})
