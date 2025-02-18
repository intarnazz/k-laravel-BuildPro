import * as GetModel from './get/Get.js'

const Get = GetModel.Get

import * as PostModel from './post/Post.js'

const Post = PostModel.Post

import * as PostSendFileModel from './post/PostSendFile.js'

const PostSendFile = PostSendFileModel.PostSendFile

export const SendImage = async (file) => await PostSendFile(`${API_URL}image`, file)

const API_URL = `http://localhost:8000/api/`

export const auth = async (url, body) => {
  const res = await Post(`${API_URL}${url}`, body)
  if (res.success) {
    sessionStorage.setItem('token', res.token)
    sessionStorage.setItem('user', JSON.stringify(res.user))
  }
  return res
}

export const reg = async (body) => {
  return await auth(`registration`, body)
}

export const log = async (body) => {
  return await auth(`authorization`, body)
}

const Push = async (url, method, data) => {
  return await Post(`${API_URL}${url}/${data.id}`, {_method: method, ...data})
}

export const GetUser = async () => await Get(`${API_URL}user`)
export const UserLogout = async () => await Get(`${API_URL}logout`)

