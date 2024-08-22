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
