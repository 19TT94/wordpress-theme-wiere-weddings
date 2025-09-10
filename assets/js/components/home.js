const getHome = () => ({
  data() {
    return {
      open: false
    };
  },
  mounted() {
    console.log("MOUNTED");
  },
  methods: {
    toggleNav() {
      this.open = !this.open;
    }
  }
});

export default getHome;
