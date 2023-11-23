import vuetify from './vuetify'
import icons from './plugins/vuetify'
import Vue from 'vue';
import store from "./store";
import moment from 'moment';
import Embed from 'v-video-embed'

require('./bootstrap');

window.Vue = require('vue');
Vue.use(Embed);

Vue.filter('isDate', function(created){
    return moment(created).format('MMMM Do, YYYY');
  });

Vue.component('movies', require('./movies/Movies.vue').default);
Vue.component('movies-detail', require('./movies/MovieDetail.vue').default);

const app = new Vue({
    vuetify,
    store,
    icons,
    el: '#app'
});
