import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        card: []
    },
    mutations: {
        CLEAR_CARD(state) {
            state.card = [];
        },
        CARD_ADD_ITEM(state, {offer}) {
            state.card = [];
        },
    },
    actions: {
        async addToCard({ commit, state }, {item, content}) {
            axios.get(route('password.confirmation').url()).then(response => {
                if (response.data.confirmed) {
                    this.$emit('confirmed');
                } else {
                    this.confirmingPassword = true;
                    this.form.password = '';

                    setTimeout(() => {
                        this.$refs.password.focus()
                    }, 250)
                }
            })
        }
    }
});

export default store;