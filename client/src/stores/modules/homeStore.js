import { defineStore } from 'pinia'
import { HOME_STORE } from '@/configs/storeTypes'

export const useHomeStore = defineStore(HOME_STORE, {
  state: () => ({
    isShowCartSideMenu: false,
    toast: {
      isShow: false,
      type: '',
      message: ''
    }
  }),
  actions: {
    onChangeShowCartSideMenu() {
      this.isShowCartSideMenu = !this.isShowCartSideMenu
    },
    onChangeToast({ show = false, type = '', message = '', timeout = 2000 } = {}) {
      this.toast.isShow = show
      this.toast.type = type
      this.toast.message = message

      if (show && timeout > 0) {
        setTimeout(() => {
          this.toast.isShow = false
          this.toast.type = ''
          this.toast.message = ''
        }, timeout)
      }
    }
  }
})
