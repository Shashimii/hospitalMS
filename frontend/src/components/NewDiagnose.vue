<template>
    <div class="container">
        <div class="container-group">
            <div class="patient">
                <h1>Patient Appointment Information</h1>
                    <div class="text-container">
                        <div class="text-group">
                        <h3>Patient Name</h3>
                        <p>{{ appointmentData.patient }}</p>
                    </div>
                    <div class="text-group">
                        <h3>Appointment Name</h3>
                        <p>{{ appointmentData.name }}</p>
                    </div>
                    <div class="text-group">
                        <h3>Appointment Description</h3>
                        <p>{{ appointmentData.description }}</p>
                    </div>
                    <div class="text-group">
                        <h3>Appointment Schedule</h3>
                        <p>{{ appointmentData.schedule }}</p>
                    </div>
                    <div class="text-group">
                        <h3>Patient Doctor</h3>
                        <p>{{ appointmentData.doctor }}</p>
                    </div>
                </div>
            </div>
            <form @submit.prevent="newDiagnosis" class="form-diagnose">
                <h1>Diagnose Patient</h1>
                <div class="form-group">
                    <label>Patient Name</label>
                    <input type="text" v-model="patient" placeholder="Enter Name" readonly required>
                </div>
                <div class="form-group">
                    <label>Diagnosis</label>
                    <textarea v-model="diagnosis" placeholder="Enter Diagnosis" required></textarea>
                </div>
                <div class="form-group">
                    <label>Diagnosed By</label>
                    <input type="text" v-model="doctor" placeholder="Enter Doctor" readonly required>
                </div>
                <div class="form-group">
                    <label>Date Diagnosed</label>
                    <input type="date" v-model="date" required>
                </div>
                <div class="form-nav">
                    <button class="form-btn" type="submit">Save Patient Diagnosis</button>
                    <p>not sure in diagnosing this patient ? you can return <a href="/appointment">here</a></p>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'DiagnosePatient',
    data() {
        return {
            appointmentData: {},
            appointmentId: '',
            
            patient: '',
            diagnosis: '',
            doctor: '',
            formatted: '',
            date: '',
            doctor_id: '',
            patient_id: ''
        };
    },

    mounted() {
        const appointmentId = this.$route.params.appointmentId;
        this.getAppointment(appointmentId);
        this.appointmentId = appointmentId;
    },

    watch: {
        date(newValue) {
            this.formatted = this.formatInputDate(newValue);
        }
    },

    methods: {
        async getAppointment(appointmentId) {
            await this.$store.dispatch('findAppointment', appointmentId);
            this.appointmentData = this.$store.getters.getAppointment;
            this.patient = this.appointmentData.patient;
            this.doctor = this.appointmentData.doctor;
            this.patient_id = this.appointmentData.patient_id;
            this.doctor_id = this.appointmentData.doctor_id;
        },

        async newDiagnosis() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/newRecord', {
                    patient: this.patient,
                    diagnosis: this.diagnosis,
                    doctor: this.doctor,
                    date: this.formatted,
                    doctor_id: this.doctor_id,
                    patient_id: this.patient_id
                });

                alert('New Diagnosis Saved');
                console.log('Success', response.data);
                this.$router.push('/medical-records')

                this.removeAppointment();

            } catch (error){
                console.error('register failed:', error.response.data);
                alert('Incorrect Diagnosis Format');
            }
        },

        removeAppointment() {
            this.$store.dispatch('remove_appointment', this.appointmentId);
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
        formattedDate() {
            return this.formatDate(this.date);
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

.container-group {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 100px;
}

.form-diagnose {
    display: flex;
    flex:1;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    gap: 20px;
}

.patient {
    display: flex;
    flex-direction: column;
}

.text-container {
    display: flex;
    flex:1;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    gap: 20px;
    font-size: 20px;
}
</style>
