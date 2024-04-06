import getHome from "./components/home.js";

Vue.component("Home", getHome());

new Vue({
  el: document.getElementById("site-wrapper")
});
