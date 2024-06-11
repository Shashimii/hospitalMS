<template>
    <div class="header">
        <h1>Hospital MS</h1>
    </div>
    <nav>
        <router-link to="/">Dashboard</router-link>
        <router-link to="/patient">Patients</router-link>
        <router-link to="/doctor">Doctors</router-link>
        <router-link to="/appointment">Appointments</router-link>
        <router-link to="/profile">Profile Settings</router-link>
    </nav>
    <div class="button">
        <button class="danger-btn" @click="logout">Logout</button>
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