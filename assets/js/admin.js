let state = [];
let lastRow = null;
const rows = document.querySelectorAll("table tr");
const inputElems = document.querySelectorAll("form input");
const btnElems = document.querySelectorAll("button");

rows.forEach((row) => {
  row.addEventListener("click", () => {
    if (row === rows[0]) return;
    if (row === lastRow) return;

    inputElems[0].value = row.querySelector("td:nth-child(1)").innerText;
    inputElems[1].value = row.querySelector("td:nth-child(2)").innerText;
    inputElems[2].value = row.querySelector("td:nth-child(3)").innerText;
    inputElems[3].value = row.querySelector("td:nth-child(4)").innerText;

    checkInput();
  });
});

// rows[1].click();

btnElems.forEach((btn) => {
  btn.addEventListener("click", async () => {
    if (btn.id === "btn-create") {
    }
    if (btn.id === "btn-read") {
      const data = await getAll();
      showAll(data);
    }
    if (btn.id === "btn-update") {
    }
    if (btn.id === "btn-delete") {
    }
  });
});
function getAll() {
  return new Promise((resolve, reject) => {
    fetch("http://localhost:8000/product/getAll")
      .then((response) => response.json())
      .then((data) => resolve(data))
      .catch((e) => reject(e));
  });
}
function showAll(data) {
  rows.forEach((row) => {
    if (row !== rows[0]) {
      row.remove();
    }
  });
  data.forEach((product) => {
    const tr = document.createElement("tr");
    const html = `
      <td>${product.id}</td>
      <td>${product.name}</td>
      <td>${product.price}</td>
      <td>${product.stock}</td>`;
    tr.innerHTML = html;
    document.querySelector("table tbody").append(tr);
  });
}
function checkInput() {
  inputElems.forEach((elem, i) => {
    elem.removeEventListener("input", checkInput);
    elem.addEventListener("input", checkInput);

    const value = elem.value;

    if (elem.id === "id") {
      if (value && value >= 0) {
        state[i] = 1;
      } else {
        state[i] = 0;
      }
    }
    if (elem.id === "name") {
      if (value && value.length >= 5) {
        state[i] = 1;
        elem.className = "";
      } else {
        state[i] = 0;
        elem.className = "warning";
      }
    }
    if (elem.id === "price") {
      if (value && value >= 1000) {
        state[i] = 1;
        elem.className = "";
      } else {
        state[i] = 0;
        elem.className = "warning";
      }
    }
    if (elem.id === "stock") {
      if (value && value >= 1) {
        state[i] = 1;
        elem.className = "";
      } else {
        state[i] = 0;
        elem.className = "warning";
      }
    }
  });
  btnIS(state);
}

function btnIS(state) {
  btnElems.forEach((btn) => {
    if (state[0] && state[1] && state[2] && state[3]) {
      btn.disabled = false;
    } else if (state[1] && state[2] && state[3]) {
      if (btn.id === "btn-create") btn.disabled = false;
    } else {
      if (btn.id !== "btn-read") {
        btn.disabled = true;
      }
    }
  });
}

checkInput();
