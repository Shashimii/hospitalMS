<template>
    <div class="container">
        <form @submit.prevent="newAppointment" class="form">
        <h1>New Appointment</h1>
        <div class="form-group">
            <label>Appointment Name</label>
            <input type="text" v-model="name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label>Appointment Description</label>
            <textarea v-model="description" placeholder="Enter Description" required></textarea>
        </div>
        <div class="form-group">
            <label>Appointment Doctor</label>
            <select v-model="doctor_id" required>
                <option disabled selected value="">Select Doctor</option>
                <option v-for="doctor in doctorList" :key="doctor.id" :value="doctor.id">
                    {{ doctor.name }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>Appointment Schedule</label>
            <input type="date" v-model="schedule" required>
        </div>
        <div class="form-nav">
            <button class="form-btn" type="submit">Book Appointment</button>
            <p>not sure in making apppointment ? you can return <a href="/">here</a></p>
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
            description: '',
            doctor: '',
            schedule: '',
            formatted: '',
            patient: '',
            doctor_id: '',
            patient_id: '',
        };
    },

    mounted() {
        this.$store.dispatch('loadUserData');
        this.$store.dispatch('fetchDoctorList');

        if (this.userData) {
            this.extractUserData(this.userData)
        }

    },
    
    watch: {
        doctorList(value) {
            if (value) {
                console.log(value)
            }
        },

        doctor_id(value) {
            const doctor = this.doctorList.find(doctor => doctor.id === value);
            if (doctor) {
                this.doctor = doctor.name;
                this.doctor_id = doctor.id;
            }
        },

        schedule(newValue) {
            this.formatted = this.formatInputDate(newValue);
        }
    },

    methods: {
        extractUserData(userData) {
            this.patient = userData.name;
            this.patient_id = userData.id;
        },

        async newAppointment() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/newAppointment', {
                    name: this.name,
                    description: this.description,
                    doctor: this.doctor,
                    schedule: this.formatted,
                    patient: this.patient,
                    doctor_id: this.doctor_id,
                    patient_id: this.patient_id
                });

                alert('New Appointment Added');
                this.$router.push('/appointment')
                console.log('Success', response.data);
            } catch (error){
                console.error('register failed:', error.response.data);
                alert('Incorrect Doctor Credentials Format');
            }
        },

        formatDate(date) {
            if (!date) return '';
            const [day, month, year] = date.split('/');
            return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;
        },

        formatInputDate(date) {
            if (!date) return '';
            const [year, month, day] = date.split('-');
            return `${day.padStart(2, '0')}/${month.padStart(2, '0')}/${year}`;
        },
    },

    computed: {
        userData() {
            return this.$store.getters.getUserData;
        },

        doctorList() {
            return this.$store.getters.getDoctorList;
        },

        formattedDate() {
            return this.formatDate(this.schedule);
        }
    },
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
