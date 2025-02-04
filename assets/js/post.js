function viewMore(e) {
  const button = e.target;
  const parent = button.closest(".post");
  const content = parent.querySelector(".content");

  content.classList.toggle("show");
  button.innerText = content.classList.contains("show")
    ? "ẩn bớt ..."
    : "Xem thêm";
}

function showDropMenu(e) {
  const dropMenu = document.querySelector(".post-drop-menu");
  dropMenu.classList.toggle("show");
}

document.addEventListener("click", (e) => {
  if (!e.target.classList.contains("post-drop-menu")) {
    if (e.target.tagName === "BUTTON" || e.target.tagName === "I") {
      return;
    }
    document.querySelectorAll(".post-drop-menu").forEach((elem) => {
      elem.classList.remove("show");
    });
  }
});

function goBack() {
  window.history.back();
}
