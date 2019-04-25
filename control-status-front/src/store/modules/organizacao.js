import Vue from "vue";
import axios from "axios";
import jsonpAdapter from "axios-jsonp";

// Initial state
const state = {
  dados: []
};

const mutations = {
  "set-state-cnpj"(state, dados) {
    state.dados = dados;
  }
};

const actions = {
  "get-data-cnpj"(context, payload) {
    payload = payload.replace(/[^\d]+/g, "");
    axios
      .get(`https://www.receitaws.com.br/v1/cnpj/${payload}`, {
        adapter: jsonpAdapter
      })
      .then(response => {
        let dados = response.data;
        context.commit("set-state-cnpj", dados);
      });
  },
  "post-info-api"(context, payload) {
    axios
      .post("http://127.0.0.1:8000/api/company", payload)
      .then(function(response) {
        if (!response.data.success) {
          for (var key in response.data.message) {
            Vue.toasted.show(response.data.message[key][0]);
          }
          return;
        }
        Vue.toasted.show(response.data.message);
        setTimeout(function() {
          window.location.href = "/";
        }, 3000);
      });
  }
};

export default {
  state,
  getters: [],
  mutations,
  actions
};
