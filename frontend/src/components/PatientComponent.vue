<template>
    <div class="header">
        <h1>Doctors</h1>
    </div>

    <div class="content">
        <div class="content-header">
            <h2>List of Registered Patients</h2>
            <button class="form-btn" @click="toNew">New Patient</button>
        </div>

        <div class="item-group">
            <table class="styled-table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Patient Email</th>
                    <th>Patient Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <template v-if="patientList.length === 0">
                    <tr>
                        <td colspan="4" style="text-align: center">There is No Patient 💫</td>
                    </tr>
                </template>
                <template v-else>
                    <tr v-for="patientList in patientList" :key="patientList.id">
                        <td>{{ patientList.name }}</td>
                        <td>{{ patientList.email }}</td>
                        <td>{{ patientList.contact }}</td>
                        <td>
                            <button class="edit-btn" @click="toEdit(patientList.id)">📝 Edit</button>
                            <button class="delete-btn" @click="toDelete(patientList.id)">🗑️ Delete</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PatientComponent',
    data() {
        return {};
    },

    mounted() {
        this.$store.dispatch('loadUserData');
        if (this.userData) {
            this.extractUserData(this.userData)
        }
        console.log(this.userData)

        this.$store.dispatch('fetchPatientList');
        if (this.fetchPatientList) {
            console.log(this.fetchPatientList)
        }
    },

    methods: {
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

        toNew() {
            this.$router.push('/patient-new')
        },

        toEdit(patientId) {
            this.$router.push('/patient-edit' + patientId)
        },

        toDelete(patientId) {
            this.$store.dispatch('deletePatient', patientId);
        }


    },

    computed: {
        userData() {
            return this.$store.getters.getUserData;
        },

        patientList() {
            return this.$store.getters.getPatientList;
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

.content-header {
    display: flex;
    justify-content: space-between;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 18px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
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
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1;
}
</style>
  