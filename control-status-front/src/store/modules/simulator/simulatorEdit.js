import Vue from "vue";
import axios from "axios";
import jsonpAdapter from "axios-jsonp";

// Initial state
const state = {
    dados: []
};

const mutations = {};

const actions = {
    "update-info-api"(context, payload) {
        axios
            .put("http://127.0.0.1:8000/api/simulator/" + payload.id, payload)
            .then(function(response) {
                if (!response.data.success) {
                    for (var key in response.data.message) {
                        Vue.toasted.show(response.data.message[key][0]);
                    }
                    return;
                }
                Vue.toasted.show(response.data.message).goAway(1500);
            });
    }
};

export default {
    state,
    getters: [],
    mutations,
    actions
};
