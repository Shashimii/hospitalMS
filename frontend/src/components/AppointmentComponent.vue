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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lorem</td>
                        <td>Lorem Ipsum dolor</td>
                        <td>Dr Lorem</td>
                        <td>Lorem</td>
                    </tr>
                    <tr>
                        <td>Lorem</td>
                        <td>Lorem Ipsum dolor</td>
                        <td>Dr Lorem</td>
                        <td>Lorem</td>
                    </tr>
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
        }
    },

    computed: {
        userData() {
            return this.$store.getters.getUserData;
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
  