// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  dev: process.env.NODE_ENV !== 'production',
  ssr: true,
  devtools: { enabled: true },
  modules: [
    '@invictus.codes/nuxt-vuetify',
    'nuxt3-vuex-module',
  ],
  app: {
    head: {
      link: [{ rel: 'stylesheet', href: 'http://192.168.0.36/css/base.css' }]
    }
  }
})