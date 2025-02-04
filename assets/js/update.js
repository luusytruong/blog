function adjustHeight(field) {
  field.style.height = "auto";
  field.style.height = field.scrollHeight + "px";
}

function onLoad() {
  document.querySelectorAll("textarea").forEach((input) => {
    adjustHeight(input);
  });
}
function autoScroll(field) {
  adjustHeight(field);
  document.body.scrollTop = document.body.scrollHeight + "px";
}
function go(domain) {
  window.location.href = domain + "user";
}

window.onresize = onLoad;
document.addEventListener("DOMContentLoaded", onLoad);
