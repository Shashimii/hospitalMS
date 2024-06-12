<template>
    <div class="container">
        <form @submit.prevent="updateRecord" class="form">
        <h1>Edit Medical Record</h1>
            <div class="form-group">
                <label>Patient Name</label>
                <input type="text" v-model="recordData.patient" placeholder="Enter Name" readonly required>
            </div>
            <div class="form-group">
                <label>Diagnosis</label>
                <textarea v-model="recordData.diagnosis" placeholder="Enter Diagnosis" required></textarea>
            </div>
            <div class="form-group">
                <label>Diagnosed By</label>
                <input type="text" v-model="recordData.doctor" placeholder="Enter Doctor" readonly required>
            </div>
            <div class="form-group">
                <label>Date Diagnosed</label>
                <input type="date" v-model="recordData.date" @input="check()" required>
            </div>
        <div class="form-nav">
            <button class="form-btn" type="submit">Update Patient Medical Record</button>
            <p>not sure in updating this medical record ? you can return <a href="/medical-records">here</a></p>
        </div>
    </form>
    </div>
</template>

<script>
//import axios from 'axios';

export default {
    name: 'EditRecord',
    data() {
        return {
            recordData: {},
            recordId: '',
        };
    },

    mounted() {
        const recordId = this.$route.params.recordId;
        this.getRecord(recordId);
    },

    watch: {
        'recordData.date': function(newValue) {
            this.recordData.formatted = this.formatInputDate(newValue);
        }
    },

    methods: {
        async getRecord(recordId) {
            await this.$store.dispatch('findRecord', recordId);
            this.recordData = this.$store.getters.getRecord;
            console.log(this.$store.getters.getRecord);
        },

        async updateRecord() {
            try {
                await this.$store.dispatch('updateRecord', this.recordData);
                this.$router.push('/medical-records')
            } catch (error) {
                alert('Edit Failed: ' + error.response.data.message);
            }
        },
        
        formatDate(date) {
            if (!date) return '';
            const [day, month, year] = date.split('/');
            return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;
        },

        formatInputDate(date) {
            if (!date) return '';
            const [year, month, day] = date.split('-');
            if (year && month && day) {
                return `${day.padStart(2, '0')}/${month.padStart(2, '0')}/${year}`;
            }
            return date; 
        },

        check() {
            console.log(this.recordData)
        }
    },
    
    computed: {
        formattedDate() {
            return this.formatDate(this.recordData.date);
        }
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
