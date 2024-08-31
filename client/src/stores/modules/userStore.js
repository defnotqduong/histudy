import { defineStore } from 'pinia'
import { USER_STORE } from '@/configs/storeTypes'
import { removeUserStore, removeRefreshUserStore, localEnUserStore, localEnRefreshUserStore } from '@/helpers/localStorageHelper'

export const useUserStore = defineStore(USER_STORE, {
  state: () => ({
    user: null,
    cart: [],
    wishlist: [],
    instructorCourses: [],
    enrolledCourses: []
  }),
  actions: {
    login(accToken, refToken) {
      localEnUserStore(accToken)
      localEnRefreshUserStore(refToken)
    },
    setUser(user) {
      this.user = user
    },
    logout() {
      removeUserStore()
      removeRefreshUserStore()
      this.user = null
    },
    setInstructorCourses(courses) {
      this.instructorCourses = [...courses]
    },
    setEnrolledCourses(courses) {
      this.enrolledCourses = [...courses]
    },
    setCart(courses) {
      this.cart = [...courses]
    },
    setWishlist(courses) {
      this.wishlist = [...courses]
    }
  }
})
