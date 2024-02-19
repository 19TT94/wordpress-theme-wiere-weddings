import getNavBar from "./components/nav-bar";
import getCallout from "./components/callout";
// import getHome from "./components/home.js";
// import getPlayer from "./components/player.js";
// import getSlider from "./components/slider.js";
// import getTestimonials from "./components/testimonials.js";

Vue.component("navigation", getNavBar());
Vue.component("callout", getCallout());
// Vue.component("home", getHome());
// Vue.component("player", getPlayer());
// Vue.component("slider", getSlider());
// Vue.component("testimonials", getTestimonials());

new Vue({
  el: document.getElementById("site-wrapper")
});
