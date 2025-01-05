import axios from 'axios';

// Define a baseURL da sua API
const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL,
});

// Intercepta as requisições para incluir o token
api.interceptors.request.use((config) => {
  const token = localStorage.getItem('access_token');
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

export default api;
