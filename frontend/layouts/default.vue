<template>
  <div>
    <div>
      Menu

      <NuxtLink to="/">
        Home
      </NuxtLink>

      <NuxtLink to="/news">
        Berita
      </NuxtLink>
      
      <NuxtLink to="/signin"
        v-if="!$auth.loggedIn">
        Masuk
      </NuxtLink>

      <NuxtLink to="/signup"
        v-if="!$auth.loggedIn">
        Daftar
      </NuxtLink>

      <NuxtLink to="/profil"
        v-if="$auth.loggedIn">
        Profil
      </NuxtLink>
      <NuxtLink to="/logs">
        Logs
      </NuxtLink>
      
      <a @click="logout"
        v-if="$auth.loggedIn">
        Logout
      </a>
    </div>

    <Nuxt />

    <div>
      Footer          
    </div>
  </div>
</template>

<script>
export default{
  methods:{
    logout(){
     this.$auth.logout().then(res => {
       this.$router.push('/');
     })
    }
  }
}
</script>