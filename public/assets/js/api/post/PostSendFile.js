function base64ToFile(base64String) {
  const [metadata, base64Data] = base64String.split(',')
  const byteCharacters = atob(base64Data)
  const byteArrays = []
  for (let offset = 0; offset < byteCharacters.length; offset += 1024) {
    const slice = byteCharacters.slice(offset, offset + 1024)
    const byteNumbers = new Array(slice.length)
    for (let i = 0; i < slice.length; i++) {
      byteNumbers[i] = slice.charCodeAt(i)
    }
    byteArrays.push(new Uint8Array(byteNumbers))
  }
  return new Blob(byteArrays, { type: 'image/jpeg' })
}

export async function PostSendFile(url = '', base64 = '') {
  const file = base64ToFile(base64)

  const formData = new FormData()
  formData.append('file', file)

  return await fetch(`${url}`, {
    method: 'POST',
    headers: {
      Accept: 'application/json',
      Authorization: `Bearer ${sessionStorage.getItem('token')}`
    },
    body: formData
  })
    .then((response) => response.json())
    .then((json) => {
      return json
    })
    .catch((e) => {
      throw e
    })
}
