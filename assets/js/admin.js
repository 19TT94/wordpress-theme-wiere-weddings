// TODO: add css for initial hide states

const selector = document.getElementById("hc_field_type");
const paragraph = document.getElementById("hc_field_paragraph");
const list = document.getElementById("hc_field_list");

// Initial State
const { value } = selector;
console.log(value);
paragraph.style.display = ["text", "callout"].includes(value)
  ? "block"
  : "none";
list.style.display = ["block-left", "block-right"].includes(value)
  ? "block"
  : "none";

const handleSelect = ({ target: { value } }) => {
  if (["text", "callout"].includes(value)) {
    paragraph.style.display = "block";
    list.style.display = "none";
  } else {
    paragraph.style.display = "none";
    list.style.display = "block";
  }
};

selector.addEventListener("change", handleSelect);
