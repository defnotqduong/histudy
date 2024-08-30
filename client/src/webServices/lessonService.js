import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const createLesson = (slug, chapterId, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson`
  return connectServer[api.CREATE_LESSON_API.method](url, dataPost)
}

export const getLesson = (slug, chapterId, lessonId, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson/${lessonId}`
  return connectServer[api.GET_LESSON_API.method](url, dataPost)
}

export const reorderLesson = (slug, chapterId, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson/reorder`
  return connectServer[api.REORDER_LESSON_API.method](url, dataPost)
}

export const updateLesson = (slug, chapterId, lessonId, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson/${lessonId}`
  return connectServer[api.UPDATE_LESSON_API.method](url, dataPost)
}

export const uploadLessonVideo = (slug, chapterId, lessonId, dataPost, uploadProgress) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson/${lessonId}/video`
  const config = {
    headers: {
      'Content-Type': 'multipart/form-data'
    },
    onUploadProgress: progressEvent => {
      const progress = Math.round((progressEvent.loaded * 100) / progressEvent.total)
      uploadProgress(progress)
    }
  }
  return connectServer[api.UPLOAD_LESSON_VIDEO_API.method](url, dataPost, config)
}

export const publishLesson = (slug, chapterId, lessonId, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson/${lessonId}/publish`
  return connectServer[api.PUBLISH_LESSON_API.method](url, dataPost)
}

export const unpublishLesson = (slug, chapterId, lessonId, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson/${lessonId}/unpublish`
  return connectServer[api.UNPUBLISH_LESSON_API.method](url, dataPost)
}

export const deleteLesson = (slug, chapterId, lessonId, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${chapterId}/lesson/${lessonId}`
  return connectServer[api.DELETE_LESSON_API.method](url, dataPost)
}
