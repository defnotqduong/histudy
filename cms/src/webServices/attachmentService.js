import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const createLessonAttachment = (slug, chapterId, lessonId, dataPost, uploadProgress) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson/${lessonId}/attachment`
  const config = {
    headers: {
      'Content-Type': 'multipart/form-data'
    },
    onUploadProgress: progressEvent => {
      const progress = Math.round((progressEvent.loaded * 100) / progressEvent.total)
      uploadProgress(progress)
    }
  }
  return connectServer[api.CREATE_ATTACHMENT_API.method](url, dataPost, config)
}

export const deleteLessonAttachment = (slug, chapterId, lessonId, attachmentId, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson/${lessonId}/attachment/${attachmentId}`
  return connectServer[api.DELETE_ATTACHMENT_API.method](url, dataPost)
}
