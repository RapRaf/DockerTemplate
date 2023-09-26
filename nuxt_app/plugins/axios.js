"use strict";

import axios from 'axios';
//import store from '@/store';

export default defineNuxtPlugin(async () => {

  axios.defaults.baseURL = 'https://dev.2fgamestudio.com';//import.meta.env.VITE_API_URL || '';

  axios.interceptors.response.use(
    function (response) {
      return response;
    },
    function (error) {
      /* if (error.response.status === 401) {
        alert('Token non valido.');
        store.dispatch('logOut');
        store.dispatch('setIndex', 0);
      } */
      return Promise.reject(error);

    }
  );

  axios.interceptors.request.use(
    function (config) {
      //config.headers.Authorization = 'Bearer ' + store.getters.token;
      return config;
    },
    function (error) {
      return Promise.reject(error);
    }
  );

  return {
    provide: {
      axios: axios,
    }
  }
});
/* 
axios.defaults.baseURL = import.meta.env.VITE_API_URL || '';

axios.interceptors.response.use(
  function (response) {
    return response;
  },
  function (error) {
    if(error.response.status === 401)
    {
      alert('Token non valido.');
      store.dispatch('logOut');
      store.dispatch('setIndex', 0);
    }
    return Promise.reject(error);
    
  }
);

axios.interceptors.request.use(
  function (config) {
    config.headers.Authorization = 'Bearer ' + store.getters.token;
    return config;
  },
  function (error) {
    return Promise.reject(error);
  }
);

export default axios; */