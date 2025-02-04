const inputElems = document.querySelectorAll("input");
const btnRegister = document.querySelector("button");
let state = {};

function validatePhoneNumber(value) {
  return value && value.length === 10;
}

function validatePassword(value) {
  return value && value.length >= 6;
}

function checkInput() {
  inputElems.forEach((input) => {
    const value = input.value;
    const parent = input.closest("label");

    switch (input.name) {
      case "phone_number":
        state["phone_number"] = validatePhoneNumber(value);
        break;
      case "password":
        state["password"] = validatePassword(value);
        break;
    }
    
    parent.className = state[input.name] ? "" : "warning";
  });

  btnRegister.disabled = !(state["phone_number"] && state["password"]);
}

inputElems.forEach((input) => {
  input.addEventListener("input", checkInput);
  input.addEventListener("focusout", checkInput);
});
