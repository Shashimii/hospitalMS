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
                        <th>Doctor Contact Number</th>
                        <th>Doctor Profession</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr Lorem</td>
                        <td>Ipsum@gmail.com</td>
                        <td>0932121321</td>
                        <td>Lorem Ipsum Mastery</td>
                    </tr>
                    <tr>
                        <td>Dr Lorem</td>
                        <td>Ipsum@gmail.com</td>
                        <td>0932121321</td>
                        <td>Lorem Ipsum Mastery</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DoctorComponent',
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
        },

        toNew() {
            this.$router.push('/doctor-new')
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
  