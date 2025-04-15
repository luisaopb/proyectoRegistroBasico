
//Validamos el formulario de registro
//Validamos el correo electrónico
const email = document.getElementById("email");

email.addEventListener("input", function (event) {
  if (email.validity.typeMismatch) {
    email.setCustomValidity(
      "¡Se esperaba una dirección de correo electrónico!",
    );
  } else {
    email.setCustomValidity("");
  }
});

//Validamos la contraseña
const password = document.getElementById("password");

password.addEventListener("input", function (event) {
    if (password.validity.patternMismatch) {
        password.setCustomValidity(
        "Se esperaba una contraseña con entre 8 y 16, incluyendo al menos una letra mayúscula"
        );
    } else {
        password.setCustomValidity("");
    }
    });
