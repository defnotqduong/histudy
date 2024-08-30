import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const createChapter = (slug, dataPost) => {
  const url = `/instructor/course/${slug}/chapter`
  return connectServer[api.CREATE_CHAPTER_API.method](url, dataPost)
}

export const getChapter = (slug, id, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${id}`
  return connectServer[api.GET_CHAPTER_API.method](url, dataPost)
}

export const reorderChapter = (slug, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/reorder`
  return connectServer[api.REORDER_CHAPTER_API.method](url, dataPost)
}

export const updateChapter = (slug, id, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${id}`
  return connectServer[api.UPDATE_CHAPTER_API.method](url, dataPost)
}

export const uploadChapterVideo = (slug, id, dataPost, uploadProgress) => {
  const url = `/instructor/course/${slug}/chapter/${id}/video`
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

export const publishChapter = (slug, id, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${id}/publish`
  return connectServer[api.PUBLISH_CHAPTER_API.method](url, dataPost)
}

export const unpublishChapter = (slug, id, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${id}/unpublish`
  return connectServer[api.UNPUBLISH_CHAPTER_API.method](url, dataPost)
}

export const deleteChapter = (slug, id, dataPost) => {
  const url = `/instructor/course/${slug}/chapter/${id}`
  return connectServer[api.DELETE_CHAPTER_API.method](url, dataPost)
}
