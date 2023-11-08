function verifyEmail(email) {
    // primeiro caracter deve ser uma letra, deve ter pelo menos 3 caracteres antes do @,
    // o ultimo caracter nao deve ser especial, deve haver um @ e um . seguido de dois a quatro caracteres para o domínio
    emailRegex =
        /^[a-zA-Z][a-zA-Z0-9._-]+[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
    return emailRegex.test(email);
}

function maskEmail(input) {
    let emailValue = input.value;
    const emailMaskRegex = /^[a-zA-Z0-9._@-]/;
    // testa se o novo caracter inserido está dentro dos caracteres validos
    if (!emailMaskRegex.test(emailValue[emailValue.length - 1])) {
        input.value = emailValue.substring(0, emailValue.length - 1);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("update-email");
    const email = document.getElementById("email");

    email.addEventListener("input", function () {
        maskEmail(this);
    });

    form.addEventListener("submit", function (event) {
        let validateInput = true;

        if (!verifyEmail(email.value)) {
            // console.log("email invalido: " + email.value);
            document.getElementById("error-message").innerHTML =
                "Os campos em vermelho devem ser válidos";
            email.style.transition = "ease-in-out 0.3s";
            email.style.border = "solid 1px #f07560";
            validateInput = false;
            event.preventDefault();
        } else {
            // console.log(email.value);
            email.style.border = "solid 1px #cccccc";
        }

        // if (validateInput) {
        //     console.log("submit");
        //     form.submit();
        // } else {
        //     console.log("nao valido");
        // }
    });
});
