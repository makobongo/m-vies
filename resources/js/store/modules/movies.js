import axios from "axios";

export const namespaced = true;

const apiClient = axios.create({
    baseURL: "/api/movies"
});


export const state = {
    movies: null,
    genres: null,
    playing: null,
    detail: null,
    trends: null
};

export const mutations = {
    SUCCESS_FETCH(state, payload){
        state.movies = payload
    },
    SUCCESS_FETCH_GENRES(state, payload){
        state.genres = payload
    },
    NOW_PLAYING_MOVIES(state, payload){
        state.playing = payload
    },
    SUCCESS_FETCH_DETAIL(state, payload){
        state.detail = payload
    },
    FETCH_TRENDING_MOVIES(state, payload){
        state.trends = payload
    }
};

export const actions = {
    async fetchMovies({commit}){
        try {
            const response = await apiClient.get('');
            commit('SUCCESS_FETCH', response.data.msg);
            commit('SUCCESS_FETCH_GENRES', response.data.genres);
            commit('NOW_PLAYING_MOVIES', response.data.playing);
            // console.log(response.data.genres);
        } catch (e) {
            console.log(e.response.data.msg);
        }
    },
    async fetchDetail({commit}, id){
        try {
            const response = await apiClient.get(`/${id}`);
            commit('SUCCESS_FETCH_DETAIL', response.data.msg);
        } catch(e){
            console.log(e.response)
        }
    },
    async fetchTrends({commit}, payload){
        try {
            const response = await axios.post("/api/trending", payload);
            commit('FETCH_TRENDING_MOVIES', response.data.movieTrends)
        }
        catch(error){

        }
    }
};