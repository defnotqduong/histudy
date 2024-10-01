import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getLearningInfo = slug => {
  return connectServer[api.GET_LEARNING_INFO_API.method](api.GET_LEARNING_INFO_API.url + '/' + slug)
}

export const getLessonInfo = id => {
  return connectServer[api.GET_LESSON_INFO_API.method](api.GET_LESSON_INFO_API.url + '/' + id)
}

export const getFreeLessonVideoUrl = id => {
  return connectServer[api.GET_FREE_LESSON_VIDEO_URL_API.method](api.GET_FREE_LESSON_VIDEO_URL_API.url + '/' + id)
}

export const getAttachmentSignedUrl = id => {
  return connectServer[api.GET_ATTACHMENT_SIGNED_URL_API.method](api.GET_ATTACHMENT_SIGNED_URL_API.url + '/' + id)
}

export const updateCompletedLesson = dataPost => {
  return connectServer[api.UPDATE_COMPLETED_LESSON_API.method](api.UPDATE_COMPLETED_LESSON_API.url, dataPost)
}
