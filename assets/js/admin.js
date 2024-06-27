// Handle Field Type Dropdown
const selector = document.getElementById("hc_field_type");
const paragraph = document.getElementById("hc_field_paragraph");
const list = document.getElementById("hc_field_list");
const imageWidth = document.getElementById("hc_field_image_width");
const bulletType = document.getElementById("hc_field_bullet_type");
const addButton = document.getElementById("add_bullet");

const { value } = selector;
paragraph.style.display = ["text", "callout"].includes(value)
  ? "block"
  : "none";
list.style.display = ["block-left", "block-right"].includes(value)
  ? "block"
  : "none";
addButton.style.display = ["block-left", "block-right"].includes(value)
  ? "block"
  : "none";
imageWidth.style.display = ["block-left", "block-right"].includes(value)
  ? "block"
  : "none";
bulletType.style.display = ["block-left", "block-right"].includes(value)
  ? "block"
  : "none";

const selectPostType = ({ target: { value } }) => {
  // reset on change
  paragraph.value = null;

  if (list?.childNodes?.length > 0)
    Array.from(list.childNodes)?.map((child) => {
      child.value = null;
    });

  // set initial styles
  if (["text", "callout"].includes(value)) {
    bulletType.style.display = "none";
    addButton.style.display = "none";
    paragraph.style.display = "block";
    list.style.display = "none";
  } else {
    imageWidth.style.display = "block";
    bulletType.style.display = "block";
    addButton.style.display = "block";
    paragraph.style.display = "none";
    list.style.display = "block";
    paragraph.innerHTML = "";
  }
};

selector.addEventListener("change", selectPostType);

// Handle Blocks (Bullets)
const bulletWrapper = document.getElementById("hc_field_list");
const hidden = document.getElementById("hc_field_list_items");

const values = {};

const appendBullet = ({ target: { id, value } }) => {
  const current = hidden.value ? JSON.parse(hidden.value) : {};
  values[id] = value;
  hidden.value = JSON.stringify({ ...current, ...values });
};

const createInput = () => {
  const input = document.createElement("textarea");
  const index = bulletWrapper.children.length + 1;
  input.placeholder = `Bullet ${index}`;
  input.setAttribute("name", `hc_field_list_item_${index}`);
  input.setAttribute("id", `hc_field_list_item_${index}`);
  input.addEventListener("change", appendBullet);
  return input;
};

const addBullet = () => {
  const input = createInput();
  if (bulletWrapper.children.length < 8) {
    bulletWrapper.appendChild(input);
  } else addButton.classList.add("disabled");
};

const initializeBullets = () => {
  // create first input
  if (!hidden.value || hidden.value === "") {
    const first = createInput();
    bulletWrapper.appendChild(first);
  } else {
    const defaults = JSON.parse(hidden.value);
    Object.keys(defaults).map((key) => {
      const input = createInput();
      bulletWrapper.appendChild(input);
      input.value = defaults[key];
    });
  }
};

initializeBullets();

addButton.addEventListener("click", addBullet);
