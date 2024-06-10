<template>
    <div class="container">
        <form @submit.prevent="login">
            <input type="text" v-model="email" required>
            <input type="password" v-model="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'LoginView',
    data() {
        return {
            email: '',
            password: '',
        };
    },
    methods: {
        async login() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/login', {
                    email: this.email,
                    password: this.password,
                });

                console.log('Logged', response.data);
                localStorage.setItem('token', response.data.access_token);

                this.$router.push('/home')
            } catch (error){
                console.error('Login failed:', error.response.data);
                alert('Login failed: ' + error.response.data.message);
            }
        }
    }
}

</script>
  