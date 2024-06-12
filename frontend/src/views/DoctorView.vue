<template>
    <div class="container">
        <div class="sidebar">
            <SidebarComponent></SidebarComponent>
        </div>
        <div class="main">
            <DoctorComponent></DoctorComponent>
        </div>
    </div>
</template>

<script>
import DoctorComponent from '@/components/DoctorComponent.vue'
import SidebarComponent from '@/components/SidebarComponent.vue'

export default {
    name: 'DoctorView',
    components: {
        DoctorComponent,
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