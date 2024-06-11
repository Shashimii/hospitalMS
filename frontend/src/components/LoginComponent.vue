<template>
    <form @submit.prevent="login" class="form">
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
            <p>dont have an account ? you can register <a href="/register">here</a></p>
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
.form {
    display: flex;
    flex:1;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 45%;
    width: 30%;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.form-nav {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 20px;
}

.form-btn {
    padding: 10px 20px;
    border: none;
    background-color: #007bff;
    color: white;
    cursor: pointer;
    border-radius: 5px;
}

.form-btn:hover {
  background-color: #0056b3; 
}

</style>
  