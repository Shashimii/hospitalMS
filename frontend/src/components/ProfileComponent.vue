<template>
    <div class="header">
        <h1>Profile Settings</h1>
    </div>

    <div class="content">
        <div class="content-header">
            <h2>Profile Info</h2>
        </div>

        <div class="item-group">
            <form @submit.prevent="login" class="form">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" placeholder="Enter Name" v-model="name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" placeholder="Enter Email" v-model="email" required>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <input type="text" placeholder="Enter Role" v-model="role" readonly required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" placeholder="Enter New Password" v-model="password" required>
                </div>
                <div class="form-nav">
                    <button class="form-btn" type="submit">Save Changes</button>
                    <p>new password is required to save changes</p>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProfileComponent',
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
    justify-content: center;
    padding-inline: 20%;
}


</style>
  