import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

let store = new Vuex.Store({
  state: {
    user:{
      level:null,
      data:null,
    },
  },
  getters:{
  },
  mutations:{
    userData(state,data){
      state.user.data = data;
    },
    userlevel(state,level){
      state.user.level = level;
    }
  },

})

export default store;