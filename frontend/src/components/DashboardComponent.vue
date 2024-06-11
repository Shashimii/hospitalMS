<template>
    <h1>Dashboard</h1>
</template>

<script>
//import axios from 'axios';

export default {
    name: 'DashboardComponent',
    data() {
        return {
            email: '',
            password: '',
        };
    },

    mounted() {
        this.$store.dispatch('loadUserData');
  },
}

</script>
  