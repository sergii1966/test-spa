import './bootstrap';
import './../css/index.css'
import 'flowbite';
import router from "./routes/router.js";
import { createApp } from "vue";

import App from "./components/App.vue";

createApp(App).use(router).mount("#app");
