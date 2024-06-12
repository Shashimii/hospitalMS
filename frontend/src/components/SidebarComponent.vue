<template>
    <div class="header">
        <a href="#">
            <img src="@/assets/logo-2.png" alt="Logo" class="logo">
        </a>
    </div>
    <nav>
        <router-link to="/">Dashboard</router-link>
        <template v-if="this.role === 'Admin'">
            <router-link to="/patient">Patients</router-link>
        </template>
        <template v-else-if="this.role === 'Doctor'">
            <router-link to="/patient">Patients</router-link>
        </template>
        <template v-if="this.role === 'Admin'">
            <router-link to="/doctor">Doctors</router-link>
        </template>
        <router-link to="/appointment">Appointments</router-link>
        <router-link to="/medical-records">Medical Records</router-link>
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

    data() {
        return {
            role: ''
        }
    },

    mounted() {
        this.$store.dispatch('loadUserData');

        if (this.userData) {
            this.extractUserData(this.userData)
        }
        console.log(this.userData)
    },


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
        },

        extractUserData(userData) {
            this.name = userData.name;
            this.email = userData.email;

            if (this.userData.role === '1') {
                this.role = 'Admin';
            } else if (this.userData.role === '2') {
                this.role = 'Doctor';
            } else {
                this.role = 'Patient';
            }
        },
    },

    computed: {
        userData() {
            return this.$store.getters.getUserData;
        }
    },
}

</script>

<style scoped>
.logo {
    width: 90%;
    height: 90%;
    object-fit: contain;
}

</style>