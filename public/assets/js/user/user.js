export const token = () => {
  return sessionStorage.getItem('token') != undefined
}

export const user = () => {
  return JSON.parse(sessionStorage.getItem('user'))
}

export const setUser = (user) => {
  console.log('user', user)
  sessionStorage.setItem('user', JSON.stringify(user))
}

import {UserLogout} from '../api/api.js'

export const logout = () => {
  UserLogout()
  sessionStorage.removeItem('token')
  sessionStorage.removeItem('user')
  window.location.reload();
}
