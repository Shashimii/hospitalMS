<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>

  <button @click="logout">Logout</button>
</template>

<script>
import axios from 'axios';
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'HomeView',
  components: {
    HelloWorld
  },

  methods: {
    async logout() {
      try {
        await axios.post('http://127.0.0.1:8000/api/logout', {}, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`
          }
        });

        localStorage.removeItem('token');
        this.$router.push('/'); // Redirect to login page
      } catch (error) {
        console.error('Logout failed:', error.response.data);
        alert('Logout failed: ' + error.response.data.message);
      }
    }
  }
}
</script>
