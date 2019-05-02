import Vue from "vue";
import axios from "axios";
import jsonpAdapter from "axios-jsonp";

// Initial state
const state = {
    dados: []
};

const mutations = {};

const actions = {
    "post-machine-api"(context, payload) {
        axios
            .post("http://control-status-back.herokuapp.com/public/api/machine", payload)
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
