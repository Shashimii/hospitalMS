<template>
    <div class="header">
        <h1>Dashboard</h1>
    </div>

    <div class="content">
        <div class="content-header">
            <h1>Hello {{ role }} {{ name }}</h1>
            <p>{{ email }}</p>
        </div>

        <div class="item-group">
            <template v-if="this.role === 'Admin' || this.role === 'Doctor'">
                <div class="item">
                    <nav>
                        <router-link to="/appointment">View Appointments</router-link>
                    </nav>
                </div>
            </template>
            <template v-if="this.role === 'Admin'">
                <div class="item">
                    <nav>
                        <router-link to="/doctor">View Doctors</router-link>
                    </nav>
                </div>
            </template>
            <template v-if="this.role === 'Admin'">
                <div class="item">
                    <nav>
                        <router-link to="/patient">View Patients</router-link>
                    </nav>
                </div>
            </template>
            <template v-else-if="this.role === 'Patient'">
                <div class="item">
                    <nav>
                        <router-link to="/appointment-new">Book An Appointment</router-link>
                    </nav>
                </div>
            </template>
            <div class="item">
                <nav>
                    <router-link to="/profile">Profile Settings</router-link>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DashboardComponent',
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

.item-group {
    display: flex;
    flex: 1;
    align-items: center;
    justify-content: space-evenly;
}

.item {
    background-color: #42b983;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20%;
    height: 35%;
    border-radius: 5px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5); 
}
</style>
  