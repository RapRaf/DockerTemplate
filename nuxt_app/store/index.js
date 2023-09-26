import { createStore } from "vuex";

export default createStore({
  state: {
    name: 'Counter',
    counter: 0
  },
  getters: {
    name(state) {
      return state.name;
    },
    counter(state){
      return state.counter;
    }
  },
  mutations: {
    incr(state){
      state.counter++;
    },
    clear(state){
      state.counter = 0;
    }
  },
  actions: {
    incrementCounter({commit}){
      commit('incr');
    },
    clearCounter({commit}){
      commit('clear');
    }
  }
});