const getSlider = () => ({
  props: {
    slides: Array
  },
  
  mounted() {
    this.initialize();
  },

  data() {
    return {
      currentIndex: null,
      navigation: true,
      dots: true,
      setupFinished: false
    }
  },

  computed: {
    itemsLength() {
      return [...this.slides].length - 1
    },
    previousIndex() {
      return (this.currentIndex - 1) < 0 ? this.itemsLength : this.currentIndex - 1
    },
    nextIndex() {
      return (this.currentIndex + 1) > this.itemsLength ? 0 : this.currentIndex + 1
    },
  },

  methods: {
    initialize() {
      setTimeout(()=> {
        this.currentIndex = 0
        this.setupFinished = true
      }, 0);
      setInterval(this.forward, 5000);
    },
    setItem(index) {
      this.currentIndex = index
    },
    forward() {
      this.currentIndex = this.nextIndex
    },
    backward() {
      this.currentIndex = this.previousIndex
    }
  }
});

export default getSlider;