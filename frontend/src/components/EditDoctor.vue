<template>
    <div class="container">
        <form @submit.prevent="updateDoctor" class="form">
        <h1>New Doctor</h1>
        <div class="form-group">
            <label>Doctor Name</label>
            <input type="text" v-model="doctorData.name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label>Doctor Email</label>
            <input type="text" v-model="doctorData.email" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <label>Doctor Contact</label>
            <input type="text" v-model="doctorData.contact" placeholder="Enter Contact" required>
        </div>
        <div class="form-group">
            <label>Doctor Profession</label>
            <input type="text" v-model="doctorData.profession" placeholder="Enter Profession" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" v-model="doctorData.password" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text" placeholder="Enter Role" value="Doctor" readonly required>
        </div>
        <div class="form-nav">
            <button class="form-btn" type="submit">Edit Doctor</button>
            <p>not sure in editing existing doctor ? you can return <a href="/doctor">here</a></p>
        </div>
    </form>
    </div>
</template>

<script>
//import axios from 'axios';

export default {
    name: 'EditDoctor',
    data() {
        return {
            doctorData: {},
        };
    },

    mounted() {
        const doctorId = this.$route.params.doctorId;
        this.getDoctor(doctorId);
    },

    methods: {
        async getDoctor(doctorId) {
            await this.$store.dispatch('findDoctor', doctorId);
            this.doctorData = this.$store.getters.getDoctor;
            console.log(this.$store.getters.getDoctor);
        },

        async updateDoctor() {
            try {
                await this.$store.dispatch('updateDoctor', this.doctorData);
                this.$router.push('/doctor')
            } catch (error) {
                alert('Edit Failed: ' + error.response.data.message);
            }
        },
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
