import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const createCourseChapter = (slug, dataPost) => {
  const url = `/course/${slug}/chapter`
  return connectServer[api.CREATE_CHAPTER_COURSE_API.method](url, dataPost)
}

export const getCourseChapter = (slug, id, dataPost) => {
  const url = `/course/${slug}/chapter/${id}`
  return connectServer[api.GET_CHAPTER_COURSE_API.method](url, dataPost)
}

export const reorderCourseChapter = (slug, dataPost) => {
  const url = `/course/${slug}/chapter/reorder`
  return connectServer[api.REORDER_CHAPTER_COURSE_API.method](url, dataPost)
}

export const updateCourseChapter = (slug, id, dataPost) => {
  const url = `/course/${slug}/chapter/${id}`
  return connectServer[api.UPDATE_CHAPTER_COURSE_API.method](url, dataPost)
}

export const uploadChapterVideo = (slug, id, dataPost, uploadProgress) => {
  const url = `/course/${slug}/chapter/${id}/video`
  const config = {
    headers: {
      'Content-Type': 'multipart/form-data'
    },
    onUploadProgress: progressEvent => {
      const progress = Math.round((progressEvent.loaded * 100) / progressEvent.total)
      uploadProgress(progress)
    }
  }
  return connectServer[api.UPLOAD_CHAPTER_VIDEO_API.method](url, dataPost, config)
}

export const deleteCourseChapter = (slug, id, dataPost) => {
  const url = `/course/${slug}/chapter/${id}`
  return connectServer[api.DELETE_CHAPTER_COURSE_API.method](url, dataPost)
}
