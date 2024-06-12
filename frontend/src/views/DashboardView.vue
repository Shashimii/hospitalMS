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
}

</script>

<style scoped>
.container {
    display: grid;
    grid-template-columns: 0.2fr 1fr;
    height: 100vh;
}

.main {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding-block: 2%;
    padding-inline: 2%;
    overflow-y: auto;
}


</style>