const getHome = () => ({
  data () {
    return {
      open: false
    }
  },
  methods: {
    toggleNav () {
      this.open = !this.open
    }
  } 
});

export default getHome;