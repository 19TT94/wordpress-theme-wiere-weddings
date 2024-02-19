import { defineComponent } from "vue";
import { isMobileDevice, isMobileSize } from "../utils/index";

const getNavBar = () => ({
  data() {
    return {
      belowTop: false,
      mobile: false,
      showMenu: false,
      nav: null
    };
  },
  methods: {
    toggleBackground(): void {
      this.belowTop = window.scrollY !== 0;
    },
    handleResize(_e: object): void {
      if (isMobileDevice() || isMobileSize()) this.mobile = true;
      else this.mobile = false;
    },
    handleOutsideClick(e: any) {
      if (
        e.target !== null &&
        e.target.nextSibling !== null &&
        this.nav &&
        !this.nav.contains(e.target) &&
        !this.nav.contains(e.target.nextSibling)
      )
        this.showMenu = false;
    }
  },

  mounted() {
    if (isMobileDevice() || isMobileSize()) this.mobile = true;
    document.addEventListener("mousedown", this.handleOutsideClick);
    window.addEventListener("scroll", this.toggleBackground);
    window.addEventListener("resize", this.handleResize);
  },
  unmounted() {
    document.removeEventListener("mousedown", this.handleOutsideClick);
    window.removeEventListener("scroll", this.toggleBackground);
    window.removeEventListener("resize", this.handleResize);
  }
});

export default getNavBar;
