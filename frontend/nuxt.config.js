require('dotenv').config();

export default {
  target: 'server',

  server : {
    host: process.env.HOST
  },

  head: {
    title: 'Testing',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ],
    script : [
    ],
  },

  loading: {
    color: '#00ccff',
    height: '5px'
  },

  css: [
  ],

  plugins: [
    '~/plugins/toaster.js',
    '~/plugins/pagination.js'
  ],

  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/auth', 
  ],

  axios: {
    baseURL: process.env.API_URL
  },

  auth: {   
    watchLoggedIn: true,
    redirect : false,
    strategies: {
      local: {
        endpoints: {
          login: {
            url: 'signin',
            method: 'post',
            propertyName: 'access_token'
          },
          logout: {
            url: 'logout',
            method: 'post'
          },
          user: {
            url: 'user',
            method: 'get',
            propertyName: false
          }
        },
        tokenRequired: true,
        tokenType: 'Bearer'
      }
    }    
  },

  build: {
  }
}
