import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
  state: {
    userData: null,
    
    doctorList: [],
    finded_doctor: [],

    patientList: [],
    finded_patient: [],

    appointmentList: [],

    recordList: [],
  },
  getters: {
    getUserData: state => state.userData,

    getDoctorList: state => state.doctorList,
    getDoctor: state => state.finded_doctor,

    getPatientList: state => state.patientList,
    getPatient: state => state.finded_patient,

    getAppointmentList: state => state.appointmentList,

    getRecordList: state => state.recordList,
  },
  mutations: {
    set_user_data(state, userData) {
      state.userData = userData;
    },

    set_doctor_list(state, doctorList) {
      state.doctorList = doctorList;
    },

    finded_doctor(state, finded_doctor) {
      state.finded_doctor = finded_doctor;
    },

    update_doctor(state, updatedDoctorData) {
      const index = state.finded_doctor.findIndex(user => user.id === updatedDoctorData.id);
      if (index !== -1) {
          state.finded_doctor.splice(index, 1, updatedDoctorData);
      } else {
          console.error('User not found');
      }
    },

    delete_doctor(state, doctorId) {
      state.doctorList = state.doctorList.filter(doctorList => doctorList.id !== doctorId);
    },

    set_patient_list(state, patientList) {
      state.patientList = patientList;
    },

    finded_patient(state, finded_patient) {
      state.finded_patient = finded_patient;
    },

    update_patient(state, updatedPatientData) {
      const index = state.finded_patient.findIndex(user => user.id === updatedPatientData.id);
      if (index !== -1) {
          state.finded_patient.splice(index, 1, updatedPatientData);
      } else {
          console.error('User not found');
      }
    },

    delete_patient(state, patientId) {
      state.patientList = state.patientList.filter(patientList => patientList.id !== patientId);
    },

    set_appointment_list(state, appointmentList) {
      state.appointmentList = appointmentList;
    },

    set_record_list(state, recordList) {
      state.recordList = recordList;
    },
  },
  actions: {
    fetchUserInfo({ commit }, userData) {
      commit('set_user_data', userData)
    },

    loadUserData({ commit }) {
      const userData = JSON.parse(localStorage.getItem('user'));
      if (userData) {
        commit('set_user_data', userData);
      }
    },

    async fetchDoctorList({ commit }) {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/fetchDoctor');
        commit('set_doctor_list', response.data);
      } catch (error) {
        console.log('unable to fetch doctors list: ', error.message)
      }
    },

    async findDoctor({ commit }, doctorId) {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/findDoctor/${doctorId}`);
        commit('finded_doctor', response.data);
      } catch (error) {
        console.log('unable to find doctor', error.message)
      }
    },
    
    async updateDoctor({ commit }, doctorData) {
      const { id, ...updatedDoctorData } = doctorData; 
  
      try {
          await axios.patch(`http://127.0.0.1:8000/api/updateDoctor/${id}`, updatedDoctorData);
          commit('update_doctor', doctorData);
      } catch (error) {
          console.log('unable to edit', error.message)
      }
    },

    async deleteDoctor({ commit }, doctorId) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/deleteDoctor/${doctorId}`);
        commit('delete_doctor', doctorId);
      } catch (error) {
        console.log('unable to delete', error.message)
      }
    },

    async fetchPatientList({ commit }) {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/fetchPatient');
        commit('set_patient_list', response.data);
      } catch (error) {
        console.log('unable to fetch patient list: ', error.message)
      }
    },

    async findPatient({ commit }, patientId) {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/findPatient/${patientId}`);
        commit('finded_patient', response.data);
      } catch (error) {
        console.log('unable to find patient', error.message)
      }
    },
    
    async updatePatient({ commit }, patientData) {
      const { id, ...updatedPatientData } = patientData; 
  
      try {
          await axios.patch(`http://127.0.0.1:8000/api/updatePatient/${id}`, updatedPatientData);
          commit('update_patient', patientData);
      } catch (error) {
          console.log('unable to edit', error.message)
      }
    },

    async deletePatient({ commit }, patientId) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/deletePatient/${patientId}`);
        commit('delete_patient', patientId);
      } catch (error) {
        console.log('unable to delete', error.message)
      }
    },

    async fetchAppointmentList({ commit }) {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/fetchAppointments');
        commit('set_appointment_list', response.data);
      } catch (error) {
        console.log('unable to fetch appointment list: ', error.message)
      }
    },

    async fetchRecordList({ commit }) {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/fetchRecords');
        commit('set_record_list', response.data);
      } catch (error) {
        console.log('unable to fetch records list: ', error.message)
      }
    },

  },
  modules: {
  }
})
