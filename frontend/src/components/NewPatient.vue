<template>
    <div class="container">
        <form @submit.prevent="register" class="form">
        <h1>New Patient</h1>
        <div class="form-group">
            <label>Patient Name</label>
            <input type="text" v-model="name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label>Patient Email</label>
            <input type="text" v-model="email" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <label>Patient Contact</label>
            <input type="text" v-model="contact" placeholder="Enter Contact" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" v-model="password" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text" placeholder="Enter Role" value="Patient" readonly required>
        </div>
        <div class="form-nav">
            <button class="form-btn" type="submit">Add Doctor</button>
            <p>not sure in adding new patient ? you can return <a href="/patient">here</a></p>
        </div>
    </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'NewPatient',
    data() {
        return {
            name: '',
            email: '',
            contact: '',
            password: '',
            role: '3',
        };
    },
    methods: {
        async register() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/register', {
                    name: this.name,
                    email: this.email,
                    contact: this.contact,
                    password: this.password,
                    role: this.role,
                });

                alert('New Patient Added');
                this.$router.push('/patient')
                console.log('Success', response.data);
            } catch (error){
                console.error('register failed:', error.response.data);
                alert('Incorrect Patient Credentials Format');
            }
        }
    }
}

</script>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}
</style>
