export const formatPrice = price => {
  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD'
  }).format(price)
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
