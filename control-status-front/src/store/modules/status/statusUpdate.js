import Vue from "vue";
import axios from "axios";
import jsonpAdapter from "axios-jsonp";

// Initial state
const state = {
    dados: []
};

const mutations = {};

const actions = {
    "update-status-api"(context, payload) {
        axios
            .put("http://control-status-back.herokuapp.com/public/api/status/" + payload.id, payload)
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
