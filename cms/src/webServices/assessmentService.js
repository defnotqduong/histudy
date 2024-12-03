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
