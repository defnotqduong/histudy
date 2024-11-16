const isProd = import.meta.env.PROD

export const BASE_API_URL = isProd ? 'http://18.139.108.134:8000/api' : 'http://18.139.108.134:8000/api'

export const BASE_WS_URL = isProd ? 'ws://localhost:8080' : 'ws://localhost:8080'
