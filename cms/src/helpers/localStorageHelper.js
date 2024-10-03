import { KEY_USER_STORAGE, KEY_RF_USER_STORAGE } from '@/configs/constantTypes'
import { refreshToken } from '@/webServices/authorizationService'

export const refTokenUserStore = async () => {
  try {
    const refToken = localDeRefreshUserStore()
    const res = await refreshToken({
      refresh_token: refToken
    })
    const { access_token, refresh_token } = res.data

    return { access_token, refresh_token }
  } catch (error) {
    console.log('Error refreshing access token:', error)
    return null
  }
}

export const localEnUserStore = str => {
  if (!str) return
  localStorage.setItem(KEY_USER_STORAGE, JSON.stringify(str))
}

export const localEnRefreshUserStore = str => {
  if (!str) return
  localStorage.setItem(KEY_RF_USER_STORAGE, JSON.stringify(str))
}

export const removeUserStore = () => {
  localStorage.removeItem(KEY_USER_STORAGE)
}

export const removeRefreshUserStore = () => {
  localStorage.removeItem(KEY_RF_USER_STORAGE)
}

export const localDeRefreshUserStore = str => {
  if (!str) {
    str = localStorage.getItem(KEY_RF_USER_STORAGE)
  }
  if (!str) return null
  try {
    return JSON.parse(str)
  } catch (error) {
    return null
  }
}

export const localDeUserStore = str => {
  if (!str) {
    str = localStorage.getItem(KEY_USER_STORAGE)
  }
  if (!str) return null
  try {
    return JSON.parse(str)
  } catch (error) {
    return null
  }
}

export const gtka = () => {
  let str = localStorage.getItem(KEY_USER_STORAGE)
  let jd = localDeUserStore(str)
  if (!jd) return null
  return jd
}
