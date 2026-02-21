(function () {
  function formatPhone(digits) {
    const d = digits.substring(0, 10);

    let res = "+7";
    if (d.length > 0) res += " (" + d.substring(0, Math.min(3, d.length));
    if (d.length >= 3) res += ")";
    if (d.length > 3) res += " " + d.substring(3, Math.min(6, d.length));
    if (d.length > 6) res += "-" + d.substring(6, Math.min(8, d.length));
    if (d.length > 8) res += "-" + d.substring(8, Math.min(10, d.length));

    return res;
  }

  function getDigits(value) {
    return value.replace(/\D/g, "");
  }

  function normalizeDigits(digits) {
    // если вставили 8XXXXXXXXXX или 7XXXXXXXXXX — приводим к 10 цифрам без кода страны
    if (digits.startsWith("8")) digits = "7" + digits.slice(1);
    if (digits.startsWith("7")) digits = digits.slice(1);
    return digits.substring(0, 10);
  }

  function attachMask(input) {
    const apply = () => {
      const digits = normalizeDigits(getDigits(input.value));
      input.value = digits.length ? formatPhone(digits) : "";
    };

    input.addEventListener("input", apply);
    input.addEventListener("focus", apply);
    input.addEventListener("paste", () => setTimeout(apply, 0));
  }

  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".phone-mask").forEach(attachMask);
  });
})();