const inputElems = document.querySelectorAll("input");
const btnRegister = document.querySelector("button");
const noteElem = document.querySelector(".note");
const noteChilds = document.querySelectorAll(".note div");

let state = {};
let valid = {};

function validateFullName(value) {
  return value && value.length >= 6;
}

function validatePhoneNumber(value) {
  return value && value.length === 10;
}

function validatePassword(value) {
  noteElem.classList.add("show");

  valid["upper"] = /[A-Z]/.test(value);
  valid["char"] = /[!@#$%^&*(),.?"':;`~{}|<>]/.test(value);
  valid["number"] = /[0-9]/.test(value);
  valid["length"] = value.length >= 8;

  noteChilds[0].className = valid["upper"] ? "ok" : "";
  noteChilds[1].className = valid["char"] ? "ok" : "";
  noteChilds[2].className = valid["number"] ? "ok" : "";
  noteChilds[3].className = valid["length"] ? "ok" : "";

  return valid["upper"] && valid["char"] && valid["number"] && valid["length"];
}

function validateRepeatPassword(value) {
  return state["password_valid"] && value === state["password"];
}

function checkInput() {
  inputElems.forEach((input) => {
    const value = input.value;
    const parent = input.closest("label");

    switch (input.name) {
      case "full_name":
        state["full_name"] = validateFullName(value);
        break;
      case "phone_number":
        state["phone_number"] = validatePhoneNumber(value);
        break;
      case "password":
        state["password"] = value;
        state["password_valid"] = validatePassword(value);
        break;
      case "repeat_password":
        state["repeat_password"] = validateRepeatPassword(value);
        break;
    }

    parent.className = state[input.name] ? "" : "warning";
  });

  btnRegister.disabled = !(
    state["full_name"] &&
    state["phone_number"] &&
    state["password_valid"] &&
    state["repeat_password"]
  );
}

inputElems.forEach((input) => {
  input.addEventListener("input", checkInput);
  input.addEventListener("focusout", checkInput);
});
