<template>
    <div class="container">
        <div class="sidebar">
            <SidebarComponent></SidebarComponent>
        </div>
        <div class="main">
            <DashboardComponent></DashboardComponent>
        </div>
    </div>
</template>

<script>
import DashboardComponent from '@/components/DashboardComponent.vue'
import SidebarComponent from '@/components/SidebarComponent.vue'

export default {
    name: 'DashboardView',
    components: {
        DashboardComponent,
        SidebarComponent
    },

    computed: {
        userData() {
            return this.$store.getters.getUserData;
        }
    },
    mounted() {
        console.log(this.userData)
    }

}

</script>

<style scoped>
.container {
    display: grid;
    grid-template-columns: 0.2fr 1fr;
    height: 100vh;
    background-color: aqua;
}

.sidebar {
    display: grid;
    grid-template-rows: 0.2fr 1fr 0.2fr;
    padding-block: 10%;
    padding-inline: 10%;
}

.main {
    padding-block: 2%;
    padding-inline: 2%;
}

</style>