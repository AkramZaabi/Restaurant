
import { createApp } from "vue";
import App from "./App.vue";
import  axios from "axios";
import router from "./router";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import { createPinia } from 'pinia'
const pinia = createPinia()
axios.defaults.baseURL="http://localhost:8000/api"
const app = createApp(App)
app.use(pinia).use(router).mount("#app");
