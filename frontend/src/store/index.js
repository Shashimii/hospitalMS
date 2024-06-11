import { createStore } from 'vuex'

export default createStore({
  state: {
    userData: null
  },
  getters: {
    getUserData(state) {
      return state.userData
    }
  },
  mutations: {
    setUserData(state, userData) {
      state.userData = userData;
    }
  },
  actions: {
    fetchUserInfo({ commit }, userData) {
      commit('setUserData', userData)
    },

    loadUserData({ commit }) {
      const userData = JSON.parse(localStorage.getItem('user'));
      if (userData) {
        commit('setUserData', userData);
      }
    },
  },
  modules: {
  }
})
