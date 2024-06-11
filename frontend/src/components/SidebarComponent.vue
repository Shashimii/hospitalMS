<template>
    <div class="header">
        <h1>Hospital MS</h1>
    </div>
    <div class="links">
        <div><router-link to="/register">Dashboard</router-link></div>
        <div><router-link to="/">Patients</router-link></div>
        <div><router-link to="/">Doctors</router-link></div>
        <div><router-link to="/">Appointments</router-link></div>
        <div><router-link to="/">Manage User</router-link></div>
    </div>
    <div class="button">
        <button @click="logout">Logout</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'SidebarComponent',

    methods: {
        async logout() {
        try {
            await axios.post('http://127.0.0.1:8000/api/logout', {}, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            });

            localStorage.removeItem('user');

            localStorage.removeItem('token');
            this.$router.push('/login'); // Redirect to login page
            } catch (error) {
                console.error('Logout failed:', error.response.data);
                alert('Logout failed: ' + error.response.data.message);
            }
        }
    }
}

</script>