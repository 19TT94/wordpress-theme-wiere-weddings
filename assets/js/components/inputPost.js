const inputPost = () => ({
  data() {
    return {
      open: false
    };
  },
  methods: {
    toggleNav() {
      this.open = !this.open;
    }
  }
});

export default inputPost;
