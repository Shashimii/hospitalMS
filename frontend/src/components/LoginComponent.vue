<template>
    <form @submit.prevent="login" class="form">
        <a href="#">
            <img src="@/assets/logo-1.png" alt="Logo" class="logo">
        </a>
        <h1>Login</h1>
        <div class="form-group">
            <label>Email</label>
            <input class="form-input" type="text" v-model="email" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-input" type="password" v-model="password" placeholder="Enter Password" required>
        </div>
        <div class="form-nav">
            <button class="form-btn" type="submit">Login</button>
            <p>this option is for developement mode only. register <a href="/register">here</a></p>
        </div>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    name: 'LoginComponent',
    data() {
        return {
            email: '',
            password: '',
            userData: null
        };
    },
    methods: {

        async login() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/login', {
                    email: this.email,
                    password: this.password,
                });

                localStorage.setItem('token', response.data.access_token);

                this.userData = response.data.user;
                localStorage.setItem('user', JSON.stringify(this.userData));
                this.$store.dispatch('fetchUserInfo', this.userData)
                this.$router.push('/')

                console.log('Logged', response.data);
            } catch (error){

                console.error('Login failed:', error.response.data);
                alert('Login failed: ' + error.response.data.message);

            }
        }
    }
}

</script>

<style scoped>
.logo {
    width: 80%;
    height: 80%;
    object-fit: contain;
}
</style>