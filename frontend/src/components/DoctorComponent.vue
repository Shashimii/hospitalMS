<template>
    <div class="header">
        <h1>Doctors</h1>
    </div>

    <div class="content">
        <div class="content-header">
            <h2>List of Registered Doctors</h2>
            <button class="form-btn" @click="toNew">New Doctor</button>
        </div>

        <div class="item-group">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Doctor Email</th>
                        <th>Doctor Contact</th>
                        <th>Doctor Profession</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-if="doctorList.length === 0">
                        <tr>
                            <td colspan="4" style="text-align: center">There is No Doctor 💫</td>
                        </tr>
                    </template>
                    <template v-else>
                        <tr v-for="doctorList in doctorList" :key="doctorList.id">
                            <td>{{ doctorList.name }}</td>
                            <td>{{ doctorList.email }}</td>
                            <td>{{ doctorList.contact }}</td>
                            <td>{{ doctorList.profession }}</td>
                            <td>
                                <button class="edit-btn" @click="toEdit(doctorList.id)">📝 Edit</button>
                                <button class="delete-btn" @click="toDelete(doctorList.id)">🗑️ Delete</button>
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
    name: 'DoctorComponent',
    data() {
        return {};
    },

    mounted() {
        this.$store.dispatch('loadUserData');
        if (this.userData) {
            this.extractUserData(this.userData)
        }
        console.log(this.userData)

        this.$store.dispatch('fetchDoctorList');
        if (this.doctorList) {
            console.log(this.doctorList)
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
            this.$router.push('/doctor-new')
        },

        toEdit(doctorId) {
            this.$router.push('/doctor-edit' + doctorId)
        },

        toDelete(doctorId) {
            this.$store.dispatch('deleteDoctor', doctorId);
        }


    },

    computed: {
        userData() {
            return this.$store.getters.getUserData;
        },

        doctorList() {
            return this.$store.getters.getDoctorList;
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
  