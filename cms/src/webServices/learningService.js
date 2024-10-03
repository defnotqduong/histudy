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

export const createDiscussion = (lessonId, dataPost) => {
  const url = `/learning/lesson` + '/' + lessonId + '/discussion'
  return connectServer[api.CREATE_DISCUSSION_API.method](url, dataPost)
}

export const createNoteLesson = (lessonId, dataPost) => {
  const url = `/learning/lesson` + '/' + lessonId + '/note'
  return connectServer[api.CREATE_NOTE_API.method](url, dataPost)
}

export const deleteNoteLesson = (lessonId, noteId) => {
  const url = `/learning/lesson` + '/' + lessonId + '/note' + '/' + noteId
  return connectServer[api.DELETE_NOTE_API.method](url)
}

export const reviewCourse = (courseId, dataPost) => {
  return connectServer[api.REVIEW_COURSE_API.method](api.REVIEW_COURSE_API.url + '/' + courseId, dataPost)
}
