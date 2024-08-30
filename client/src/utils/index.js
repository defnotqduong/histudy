export const formatPrice = price => {
  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD'
  }).format(price)
}

export const formatDuration = seconds => {
  const hrs = Math.floor(seconds / 3600)
  const mins = Math.floor((seconds % 3600) / 60)
  const secs = seconds % 60

  return `${hrs > 0 ? `${hrs}hr ` : ''}${mins}min ${secs}sec`
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
