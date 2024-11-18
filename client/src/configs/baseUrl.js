const isProd = import.meta.env.PROD

export const BASE_API_URL = isProd ? 'https://www.api.histudy.online/api' : 'https://www.api.histudy.online/api'

export const BASE_WS_URL = isProd ? 'wss://sm.histudy.online' : 'wss://sm.histudy.online'
