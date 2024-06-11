<template>
    <div class="container">
        <RegisterComponent></RegisterComponent>
    </div>
</template>

<script>
import RegisterComponent from '@/components/RegisterComponent.vue'

export default {
    name: 'RegisterView',
    components: {
        RegisterComponent
    }
}

</script>


<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}
</style>