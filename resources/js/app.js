import Vue from "vue";
import axios from "axios";
import router from "./router";

window.Vue = Vue;
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.withCredentials = true;
window.axios.defaults.baseURL = process.env.APP_URL;

require("./components/inline/Navbar");
require("./components/inline/Slider");
Vue.component("admin-index", require("./components/admin/AdminIndex").default);
Vue.component("my-navbar", require("./components/Navbar").default);
Vue.component('job-list', require("./components/views/jobs/JobList").default);

const app = new Vue({
    el: "#app",
    router
});
