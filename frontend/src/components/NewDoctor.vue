<template>
    <div class="container">
        <form @submit.prevent="register" class="form">
        <h1>New Doctor</h1>
        <div class="form-group">
            <label>Doctor Name</label>
            <input type="text" v-model="name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label>Doctor Email</label>
            <input type="text" v-model="email" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <label>Doctor Contact</label>
            <input type="text" v-model="contact" placeholder="Enter Contact" required>
        </div>
        <div class="form-group">
            <label>Doctor Profession</label>
            <input type="text" v-model="profession" placeholder="Enter Profession" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" v-model="password" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text" placeholder="Enter Role" value="Doctor" readonly required>
        </div>
        <div class="form-nav">
            <button class="form-btn" type="submit">Add Doctor</button>
            <p>not sure in adding new doctor ? you can return <a href="/doctor">here</a></p>
        </div>
    </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'NewDoctor',
    data() {
        return {
            name: '',
            email: '',
            contact: '',
            profession: '',
            password: '',
            role: '2',
        };
    },
    methods: {
        async register() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/register', {
                    name: this.name,
                    email: this.email,
                    contact: this.contact,
                    profession: this.profession,
                    password: this.password,
                    role: this.role,
                });

                alert('New Doctor Added');
                this.$router.push('/doctor')
                console.log('Success', response.data);
            } catch (error){
                console.error('register failed:', error.response.data);
                alert('Incorrect Doctor Credentials Format');
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
