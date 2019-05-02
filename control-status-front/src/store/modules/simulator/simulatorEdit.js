import Vue from "vue";
import axios from "axios";
import jsonpAdapter from "axios-jsonp";

// Initial state
const state = {
    dados: []
};

const mutations = {};

const actions = {
    "update-simulator-api"(context, payload) {
        axios
            .put("https://control-status-back.herokuapp.com/public/api/simulator/" + payload.id, payload)
            .then(function(response) {
                if (!response.data.success) {
                    for (var key in response.data.message) {
                        Vue.toasted.show(response.data.message[key][0]);
                    }
                    return;
                }
                Vue.toasted.show(response.data.message).goAway(2000);
            });
    }
};

export default {
    state,
    getters: [],
    mutations,
    actions
};
