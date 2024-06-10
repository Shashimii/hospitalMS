<template>
    <div class="container">
        <form @submit.prevent="register">
            <input type="text" v-model="name" required>
            <input type="text" v-model="email" required>
            <input type="password" v-model="password" required>
            <select v-model="role" required>
                <option hidden selected>Select Role</option>
                <option value="1">Admin</option>
                <option value="2">Doctor</option>
                <option value="3">Patient</option>
            </select>
            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'RegisterView',
    data() {
        return {
            name: '',
            email: '',
            password: '',
            role: '',
        };
    },
    methods: {
        async register() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    role: this.role,
                });

                console.log('Registered', response.data);

                this.$router.push('/')
            } catch (error){
                console.error('Login failed:', error.response.data);
                alert('Login failed: ' + error.response.data.message);
            }
        }
    }
}

</script>
  