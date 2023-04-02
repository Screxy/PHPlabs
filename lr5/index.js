const numbers = document.querySelectorAll(".numbers");
const result = document.querySelector(".result span");

const url = "calc.php";

function sendRequest(url, primer) {
  const xhr = new XMLHttpRequest();
  let sendingPrimer = `res=${primer}`;
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(sendingPrimer);
  xhr.onload = () => (result.innerHTML = xhr.response);
}

var x = 1;

let value = "";
document.addEventListener("click", function (event) {
  if (event.target.closest(".equal")) {
    if (openBrackets()) {
      sendRequest(url, value);
    }
  }
  if (event.target.closest(".clear")) {
    clear();
  }
  if (event.target.closest(".dellast")) {
    clearLast();
  }
  if (event.target.closest(".numbers")) {
    let atr = event.target.getAttribute("value");
    getValue(atr);
  }
  if (event.target.closest(".sign")) {
    let atr = event.target.getAttribute("value");
    getValue(atr);
  }
});

function getValue(el) {
  result.innerHTML = "";
  if (isLastNumber() && el == "(") {
    value += "*" + el;
    result.innerHTML = value;
    return;
  }
  if (isLastSign()) {
    if (getLastS() == "(" && el == ")") {
      value = value.substring(0, value.length - 1);
      if (value == false) value = "0";
      console.log(value);
      result.innerHTML = value;
      return;
    }
    if (getLastS() == ")" && isNumber(el)) {
      value = value + "*" + el;
      result.innerHTML = value;
      return;
    }
    if (getLastS() == ")") {
      value = value + el;
      result.innerHTML = value;
      return;
    }
    if (el == "/" || el == "+" || el == "*" || el == "-") {
      value = value.substring(0, value.length - 1) + el;
      result.innerHTML = value;
      return;
    }
  }
  value += el;
  result.innerHTML = value;
}

function getLastS() {
  return value[value.length - 1];
}

function isLastSign() {
  const signs = "+-/*()";
  return signs.includes(getLastS());
}

function isLastNumber() {
  const signs = "1234567890";
  return signs.includes(getLastS());
}

function isNumber(ell) {
  const signs = "1234567890";
  return signs.includes(ell);
}

function clear() {
  result.innerHTML = "0";
  value = "";
}

function openBrackets() {
  let brackR = 0;
  let brackL = 0;
  for (let i = 0; i < value.length; i++) {
    if (value[i] == "(") {
      brackL++;
    }
    if (value[i] == ")") {
      brackR++;
    }
  }
  return brackL == brackR;
}
function clearLast() {
  if (value.length == 1 || value == "") {
    clear();
    return;
  }
  value = value.substring(0, value.length - 1);
  result.innerHTML = value;
}
