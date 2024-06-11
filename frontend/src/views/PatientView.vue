<template>
    <div class="container">
        <div class="sidebar">
            <SidebarComponent></SidebarComponent>
        </div>
        <div class="main">
            <PatientComponent></PatientComponent>
        </div>
    </div>
</template>

<script>
import PatientComponent from '@/components/PatientComponent.vue'
import SidebarComponent from '@/components/SidebarComponent.vue'

export default {
    name: 'PatientView',
    components: {
        PatientComponent,
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

.sidebar {
    display: grid;
    grid-template-rows: 0.2fr 1fr 0.2fr;
    padding-block: 10%;
    padding-inline: 10%;
    border-right: 1px solid black;
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