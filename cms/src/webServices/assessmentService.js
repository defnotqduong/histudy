import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getInstructorAssessments = dataPost => {
  return connectServer[api.GET_INSTRUCTOR_ASSESSMENTS_API.method](api.GET_INSTRUCTOR_ASSESSMENTS_API.url, dataPost)
}

export const createAssessment = (slug, dataPost) => {
  const url = `/instructor/course/${slug}/assessment`
  return connectServer[api.CREATE_ASSESSMENT_API.method](url, dataPost)
}

export const getAssessment = (slug, id) => {
  const url = `/instructor/course/${slug}/assessment/${id}`
  return connectServer[api.GET_ASSESSMENT_API.method](url)
}
