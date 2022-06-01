require("./bootstrap");

import { createApp } from "vue";
import App from "./App.vue";
import { createStore } from "vuex";

// Create a new store instance.
const store = createStore({
    state() {
        return {
            colors: [
                {
                    color: "green",
                    products: [
                        { size: "XL", quantity: 10 },
                        { size: "L", quantity: 20 },
                        { size: "32", quantity: 20 },
                    ],
                    images: [],
                },
            ],
        };
    },
    mutations: {
        addColor(state, payload) {
            state.colors.push(payload);
            console.log(state.colors);
            state;
        },
        deleteColor(item) {
            console.log(item);
            // state.colors = state.colors.map((x) => x.color !== color);
        },
    },
});

createApp(App).use(store).mount("#app");
