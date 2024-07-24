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
    LOGOUT_USER_API: {
        method: 'post',
        url: '/auth/logout'
    }
}
