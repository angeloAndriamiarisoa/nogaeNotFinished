import axios from "axios";
import store from "../store";

const axiosClient = axios.create({
  // baseURL: 'http://127.0.0.1/api'
})

axiosClient.interceptors.request.use(config => {
  config.headers.Authorization = `Bearer ${store.getters.token}`
  return config;
})

export default axiosClient;