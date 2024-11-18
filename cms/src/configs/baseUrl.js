const isProd = import.meta.env.PROD

export const BASE_API_URL = isProd ? 'https://www.api.histudy.online/api' : 'https://www.api.histudy.online/api'

export const BASE_WS_URL = isProd ? 'ws://18.139.108.134:8080' : 'ws://18.139.108.134:8080'
