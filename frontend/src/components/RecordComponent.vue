<template>
    <div class="header">
        <h1>Medical Records</h1>
    </div>

    <div class="content">
        <div class="content-header">
            <h2>Patients Diagnosis</h2>
        </div>

        <div class="item-group">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Diagnosis</th>
                        <th>Doctor</th>
                        <th>Date Diagnosed</th>
                        <template v-if="this.role === '2'">
                            <th>Actions</th>
                        </template>
                    </tr>
                </thead>
                <tbody>
                    <template v-if="recordList.length === 0">
                        <template v-if="this.role === '2'">
                            <tr>
                                <td colspan="5" style="text-align: center">There is No Diagnosis 💫</td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr>
                                <td colspan="4" style="text-align: center">There is No Diagnosis 💫</td>
                            </tr>
                        </template>
                    </template>
                    <template v-else>
                        <tr v-for="recordList in recordList" :key="recordList.id">
                            <td>{{ recordList.patient }}</td>
                            <td>{{ recordList.diagnosis }}</td>
                            <td>{{ recordList.doctor }}</td>
                            <td>{{ recordList.date }}</td>
                            <template v-if="this.role === '2'">
                                <td>
                                    <button class="edit-btn" @click="toEdit(recordList.id)">📝 Edit</button>
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
    name: 'RecordComponent',
    data() {
        return {
            role: '',
        };
    },

    mounted() {
        this.$store.dispatch('loadUserData');

        if (this.userData) {
            this.extractUserData(this.userData)
            this.role = this.userData.role;
        }

        if (this.role === '3') {
            this.$store.dispatch('fetchRecordOwn', this.userData.id);
        } else {
            this.$store.dispatch('fetchRecordList');
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

        toEdit(recordId) {
            this.$router.push('/record-edit' + recordId)
        },
    },

    computed: {
        userData() {
            return this.$store.getters.getUserData;
        },

        recordList() {
            return this.$store.getters.getRecordList;
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
  