(function () {
  function formatPhone(digits) {
    // digits: только цифры без +7
    const d = digits.substring(0, 10);

    let res = "+7";
    if (d.length > 0) res += " (" + d.substring(0, Math.min(3, d.length));
    if (d.length >= 3) res += ")";
    if (d.length > 3) res += " " + d.substring(3, Math.min(6, d.length));
    if (d.length > 6) res += "-" + d.substring(6, Math.min(8, d.length));
    if (d.length > 8) res += "-" + d.substring(8, Math.min(10, d.length));

    // если не набрали даже 1 цифру — оставим просто +7
    return res;
  }

  function getDigits(value) {
    // оставляем только цифры
    return value.replace(/\D/g, "");
  }

  function attachMask(input) {
    const apply = () => {
      let digits = getDigits(input.value);

      // Если пользователь вставил номер с 8 или 7 в начале — убираем первую цифру
      if (digits.startsWith("8")) digits = "7" + digits.slice(1);
      if (digits.startsWith("7")) digits = digits.slice(1); // убрали код страны

      input.value = formatPhone(digits);
    };

    input.addEventListener("input", apply);
    input.addEventListener("focus", apply);
    input.addEventListener("blur", () => {
      // если оставили только "+7" или "+7 (" — очищаем
      const digits = getDigits(input.value);
      if (digits.length <= 1) input.value = "";
    });

    // при отправке формы проверим, что введено 10 цифр после +7
    const form = input.closest("form");
    if (form) {
      form.addEventListener("submit", (e) => {
        let digits = getDigits(input.value);
        if (digits.startsWith("8")) digits = "7" + digits.slice(1);
        if (digits.startsWith("7")) digits = digits.slice(1);

        if (digits.length !== 10) {
          e.preventDefault();
          input.focus();
          alert("Введите телефон полностью в формате +7 (___) ___-__-__");
        }
      });
    }
  }

  document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("phone");
    if (input) attachMask(input);
  });
})();