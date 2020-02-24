import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    state: {
        posts: [],
    },
    action: {
        async getAllPosts({ commit }) {
            return commit('setPosts', await api.get('/post/get-all'))
        },
    },
    mutations: {
        setPosts(state, response) {
            state.posts = response.data.data;
        },
    },
    strict: debug
})