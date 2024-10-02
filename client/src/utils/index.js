import _ from 'lodash'

export const formatPrice = price => {
  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD'
  }).format(price)
}

export const formatDuration = seconds => {
  const hrs = Math.floor(seconds / 3600)
  let mins

  if (hrs > 0) {
    mins = Math.round((seconds % 3600) / 60)
    return `${hrs}hr ${mins}min`
  } else {
    mins = (seconds / 60).toFixed(1)
    return `${mins}min`
  }
}

export const formatDateLong = date => {
  const inputDate = new Date(date)
  return inputDate.toLocaleDateString()
}

export const formatDateShort = date => {
  const inputDate = new Date(date)
  return inputDate.toLocaleDateString([], {
    month: '2-digit',
    year: 'numeric'
  })
}

export const formatTimeLong = date => {
  const now = new Date()
  const inputDate = new Date(date)

  if (isToday(inputDate)) {
    return inputDate.toLocaleTimeString([], {
      hour: '2-digit',
      minute: '2-digit'
    })
  } else if (isYesterday(inputDate)) {
    return (
      'Yesterday ' +
      inputDate.toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit'
      })
    )
  } else if (inputDate.getFullYear() === now.getFullYear()) {
    return (
      inputDate.toLocaleDateString([], {
        day: '2-digit',
        month: 'long'
      }) +
      ' ' +
      inputDate.toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit'
      })
    )
  } else {
    return inputDate.toLocaleDateString()
  }
}

export const formatTimeShort = date => {
  const now = new Date()
  const inputDate = new Date(date)

  if (isToday(inputDate)) {
    return inputDate.toLocaleTimeString([], {
      hour: '2-digit',
      minute: '2-digit'
    })
  } else if (isYesterday(inputDate)) {
    return 'Yesterday'
  } else if (inputDate.getFullYear() === now.getFullYear()) {
    return inputDate.toLocaleDateString([], {
      day: '2-digit',
      month: 'short'
    })
  } else {
    return inputDate.toLocaleDateString()
  }
}

export const isToday = date => {
  const today = new Date()
  return date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear()
}

export const isYesterday = date => {
  const yesterday = new Date()
  yesterday.setDate(yesterday.getDate() - 1)
  return date.getDate() === yesterday.getDate() && date.getMonth() === yesterday.getMonth() && date.getFullYear() === yesterday.getFullYear()
}

export const formatNumber = (num, f) => {
  return num.toFixed(f)
}

export const loadVideo = file =>
  new Promise((resolve, reject) => {
    const video = document.createElement('video')
    video.preload = 'metadata'

    video.onloadedmetadata = () => resolve(video)
    video.onerror = () => reject('Invalid video. Please select a video file.')

    video.src = URL.createObjectURL(file)
  })
