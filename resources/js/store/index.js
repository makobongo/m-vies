import Vue from 'vue';
import Vuex from 'vuex';

import * as movie from "./modules/movies";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        movie,
    }
})