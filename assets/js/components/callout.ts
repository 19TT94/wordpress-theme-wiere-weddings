import { defineComponent, ref, onMounted } from "vue";

const getCallout = defineComponent({
  setup() {
    const hide = ref<boolean>(true);

    onMounted(() =>
      setTimeout(() => {
        hide.value = false;
      }, 1000)
    );

    // const increment = () => {
    //   console.log("count", count);
    //   count.value++;
    // };

    // return {
    //   count,
    //   increment
    // };
  }
});

export default getCallout;
