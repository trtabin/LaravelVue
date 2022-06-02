require("./bootstrap");

import { createApp } from "vue";
import App from "./App.vue";
import { store } from "./store.js";

import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

createApp(App).use(store).use(Toast).mount("#app");
