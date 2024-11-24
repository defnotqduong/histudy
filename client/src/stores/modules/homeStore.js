import { defineStore } from 'pinia'
import { HOME_STORE } from '@/configs/storeTypes'

export const useHomeStore = defineStore(HOME_STORE, {
  state: () => ({
    isShowCartSideMenu: false,
    isShowHeaderMenu: false,
    toast: {
      isShow: false,
      type: '',
      message: ''
    },
    videoModal: {
      isShow: false,
      videoUrl: ''
    },
    popularCourses: [],
    categories: [],
    topics: []
  }),
  actions: {
    onChangeShowCartSideMenu() {
      this.isShowCartSideMenu = !this.isShowCartSideMenu
    },
    onChangeShowHeaderMenu() {
      this.isShowHeaderMenu = !this.isShowHeaderMenu
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
    },
    onChangeVideo({ show = false, url = '' }) {
      this.videoModal.isShow = show
      this.videoModal.videoUrl = url
    },
    setPopularCourses(courses) {
      this.popularCourses = [...courses]
    },
    setCategories(categories) {
      this.categories = [...categories]
    },
    setTopics(topics) {
      this.topics = [...topics]
    }
  }
})
