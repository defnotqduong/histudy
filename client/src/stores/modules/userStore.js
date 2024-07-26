import { defineStore } from 'pinia'
import { USER_STORE } from '@/configs/storeTypes'
import {
  removeUserStore,
  removeRefreshUserStore,
  localEnUserStore,
  localEnRefreshUserStore
} from '@/helpers/localStorageHelper'

export const useUserStore = defineStore(USER_STORE, {
  state: () => ({
    user: null
  }),
  actions: {
    login(accToken, refToken, user) {
      localEnUserStore(accToken)
      localEnRefreshUserStore(refToken)
      this.user = user
    },
    logout() {
      removeUserStore()
      removeRefreshUserStore()
      this.user = null
    }
  },
  persist: true
})
