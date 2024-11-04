import { defineStore } from 'pinia'
import { USER_STORE } from '@/configs/storeTypes'
import { removeUserStore, removeRefreshUserStore, localEnUserStore, localEnRefreshUserStore } from '@/helpers/localStorageHelper'

export const useUserStore = defineStore(USER_STORE, {
  state: () => ({
    user: null,
    cart: [],
    wishlist: [],
    enrolledCourses: [],
    certs: [],
    orders: [],
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
      this.cart = []
      this.wishlist = []
      this.enrolledCourses = []
      this.certs = []
      this.orders = []
      this.notifications = []
    },
    setUser(user) {
      this.user = user
    },
    setEnrolledCourses(courses) {
      this.enrolledCourses = [...courses]
    },
    setCart(courses) {
      this.cart = [...courses]
    },
    setWishlist(courses) {
      this.wishlist = [...courses]
    },
    setCerts(certs) {
      this.certs = [...certs]
    },
    setOrders(orders) {
      this.orders = [...orders]
    },
    setNotification(notis) {
      this.notifications = [...notis, ...this.notifications]
    }
  }
})
