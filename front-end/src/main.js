
import { createApp } from "vue";
import App from "./App.vue";
import  axios from "axios";
import router from "./router";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import { createPinia } from 'pinia'
import Echo from "laravel-echo"
const pinia = createPinia()
axios.defaults.baseURL="http://localhost:8000/api"
const app = createApp(App)

window.Pusher = require('pusher-js');

window.Echo = new Echo({
   broadcaster: 'pusher',
   key: "local",
   wsHost:"127.0.0.1",
   wsPort: 6001,
   cluster: "mt1",
   forceTLS: false,
   disableStats: true,
});
app.use(pinia).use(router).mount("#app");