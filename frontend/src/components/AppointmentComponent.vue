<template>
    <div class="header">
        <h1>Appointments</h1>
    </div>

    <div class="content">
        <div class="content-header">
            <h2>Scheduled Appointments</h2>
        </div>

        <div class="item-group">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Appointment Name</th>
                        <th>Appointment Description</th>
                        <th>Appointment Doctor</th>
                        <th>Appointment Patient</th>
                        <th>Appointment Schedule</th>
                        <template v-if="this.role != '1'">
                            <th>Actions</th>
                        </template>
                    </tr>
                </thead>
                <tbody>
                    <template v-if="appointmentList.length === 0">
                        <template v-if="this.role != '1'">
                            <tr>
                                <td colspan="6" style="text-align: center">There is No Appointments 💫</td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr>
                                <td colspan="5" style="text-align: center">There is No Appointments 💫</td>
                            </tr>
                        </template>
                    </template>
                    <template v-else>
                        <tr v-for="appointmentList in appointmentList" :key="appointmentList.id">
                            <td>{{ appointmentList.name }}</td>
                            <td>{{ appointmentList.description }}</td>
                            <td>{{ appointmentList.doctor }}</td>
                            <td>{{ appointmentList.patient }}</td>
                            <td>{{ appointmentList.schedule }}</td>
                            <template v-if="this.role === '2'">
                            <td>
                                <button class="edit-btn" @click="toDiagnose(appointmentList.id)">🩺 Diagnose</button>
                                <template v-if="this.role != '1'">
                                    <button class="delete-btn" @click="toDelete(appointmentList.id)">❌ Cancel</button>
                                </template>
                            </td>
                        </template>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AppointmentComponent',
    data() {
        return {
            id: '',
            name: '',
            email: '',
            role: ''
        };
    },

    mounted() {
        this.$store.dispatch('loadUserData');

        if (this.userData) {
            this.extractUserData(this.userData)
        }
        console.log(this.userData)
        
        if (this.role != '1') {
            this.$store.dispatch('fetchAppointmentOwn', this.id);
        } else {
            this.$store.dispatch('fetchAppointmentList');
        }

        console.log(this.id);

    },

    methods: {
        extractUserData(userData) {
            this.id = userData.id;
            this.name = userData.name;
            this.email = userData.email;
            this.role =userData.role;
        },

        toDiagnose(appointmentId) {
            this.$router.push('patient-diagnose' + appointmentId)
        },

        toDelete(appointmentId) {
            this.$store.dispatch('deleteAppointment', appointmentId);
        }
    },

    computed: {
        userData() {
            return this.$store.getters.getUserData;
        },

        appointmentList() {
            return this.$store.getters.getAppointmentList;
        }
    },
}

</script>

<style scoped>
.header {
    border-bottom: 1px solid black;
}

.content {
    display: flex;
    flex: 1;
    flex-direction: column;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 18px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #1c8098;
    color: #ffffff;
    text-align: center;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    text-align: center;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #1c8098;
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1;
}
</style>
  