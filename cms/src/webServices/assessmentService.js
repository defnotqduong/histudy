import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getInstructorAssessments = dataPost => {
  return connectServer[api.GET_INSTRUCTOR_ASSESSMENTS.method](api.GET_INSTRUCTOR_ASSESSMENTS.url, dataPost)
}
