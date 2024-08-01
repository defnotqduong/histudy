export default {
  //user
  REGISTER_USER_API: {
    method: 'post',
    url: '/auth/register'
  },
  LOGIN_USER_API: {
    method: 'post',
    url: '/auth/login'
  },
  REFRESH_TOKEN_API: {
    method: 'post',
    url: '/auth/refresh'
  },
  GET_USER_PROFILE_API: {
    method: 'post',
    url: '/auth/profile'
  },
  LOGOUT_USER_API: {
    method: 'post',
    url: '/auth/logout'
  }
}
