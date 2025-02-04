const iError = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>`;
const iSuccess = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>`;
const toastElem = document.getElementById("toast");
const toastHead = document.querySelector(".toast-head");
const toastTitle = document.querySelector(".toast-title");
const toastContent = document.querySelector(".toast-content");
const btnCloseToast = document.querySelector(".toast-foot i");

if (btnCloseToast) {
  btnCloseToast.addEventListener("click", () => {
    toastElem.className = "wait";
    setTimeout(() => {
      toastElem.className = "hide";
    }, 1);
  });
}

export function toast(data) {
  if (data && typeof data === "object") {
    toastElem.className = "";
    setTimeout(() => {
      toastHead.id = data.status;
      toastHead.innerHTML = data.status === "success" ? iSuccess : iError;
      toastTitle.innerText = data.title;
      toastContent.innerText = data.content;
      toastElem.className = "show";
    }, 1);
  }
}
