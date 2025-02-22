import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getInstructorAssessments = dataPost => {
  return connectServer[api.GET_INSTRUCTOR_ASSESSMENTS_API.method](api.GET_INSTRUCTOR_ASSESSMENTS_API.url, dataPost)
}

export const getAssessmentsForCourse = slug => {
  const url = `/instructor/course/${slug}/assessment`
  return connectServer[api.GET_ASSESSMENTS_FOR_COURSE_API.method](url)
}

export const createAssessment = (slug, dataPost) => {
  const url = `/instructor/course/${slug}/assessment`
  return connectServer[api.CREATE_ASSESSMENT_API.method](url, dataPost)
}

export const getAssessment = (slug, id) => {
  const url = `/instructor/course/${slug}/assessment/${id}`
  return connectServer[api.GET_ASSESSMENT_API.method](url)
}

export const editAssessment = (slug, id, dataPost) => {
  const url = `/instructor/course/${slug}/assessment/${id}`
  return connectServer[api.EDIT_ASSESSMENT_API.method](url, dataPost)
}

export const deleteAssessment = (slug, id) => {
  const url = `/instructor/course/${slug}/assessment/${id}`
  return connectServer[api.DELETE_ASSESSMENT_API.method](url)
}

export const getQuestionsForAssessment = (slug, id) => {
  const url = `/instructor/course/${slug}/assessment/${id}/questions`
  return connectServer[api.GET_QUESTIONS_FOR_ASSESSMENT.method](url)
}

export const getQuestion = (slug, id, questionId) => {
  const url = `/instructor/course/${slug}/assessment/${id}/question/${questionId}`
  return connectServer[api.GET_QUESTION_API.method](url)
}

export const createQuestion = (slug, id, dataPost) => {
  const url = `/instructor/course/${slug}/assessment/${id}/question`
  return connectServer[api.CREATE_QUESTION_API.method](url, dataPost)
}

export const editQuestion = (slug, id, questionId, dataPost) => {
  const url = `/instructor/course/${slug}/assessment/${id}/question/${questionId}`
  return connectServer[api.EDIT_QUESTION_API.method](url, dataPost)
}

export const deleteQuestion = (slug, id, questionId) => {
  const url = `/instructor/course/${slug}/assessment/${id}/question/${questionId}`
  return connectServer[api.DELETE_QUESTION_API.method](url)
}
