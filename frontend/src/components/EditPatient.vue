<template>
    <div class="container">
        <form @submit.prevent="updatePatient" class="form">
        <h1>New Patient</h1>
        <div class="form-group">
            <label>Patient Name</label>
            <input type="text" v-model="patientData.name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label>Patient Email</label>
            <input type="text" v-model="patientData.email" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <label>Patient Contact</label>
            <input type="text" v-model="patientData.contact" placeholder="Enter Contact" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" v-model="patientData.password" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text" placeholder="Enter Role" value="Patient" readonly required>
        </div>
        <div class="form-nav">
            <button class="form-btn" type="submit">Edit Patient</button>
            <p>not sure in editing existing patient ? you can return <a href="/patient">here</a></p>
        </div>
    </form>
    </div>
</template>

<script>
//import axios from 'axios';

export default {
    name: 'EditPatient',
    data() {
        return {
            patientData: {},
        };
    },

    mounted() {
        const patientId = this.$route.params.patientId;
        this.getPatient(patientId);
    },

    methods: {
        async getPatient(patientId) {
            await this.$store.dispatch('findPatient', patientId);
            this.patientData = this.$store.getters.getPatient;
            console.log(this.$store.getters.getPatient);
        },

        async updatePatient() {
            try {
                await this.$store.dispatch('updatePatient', this.patientData);
                this.$router.push('/patient')
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
