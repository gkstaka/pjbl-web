function verifyPassword(password) {
    const passwordRegex =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-=+_{}\[\]|;:.,<>?/])[A-Za-z\d!@#$%^&*()\-=+_{}\[\]|;:.,<>?/]{8,}$/;
    return passwordRegex.test(password);
}

function maskPassword(input) {
    let passwordValue = input.value;
    const passwordRegex =
        /[0-9A-Za-z\d!@#$%^&*()\-=+_{}\[\]|;:.,<>?\/]/;
    if (
        !passwordRegex.test(passwordValue[(passwordValue.length = 1)]) ||
        passwordValue[(passwordValue.length = 1)] == " "
    ) {
        input.value = passwordValue.substring(0, passwordValue.length - 1);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("change-password");
    const currentPassword = document.getElementById("current-password");
    const newPassword = document.getElementById("new-password");
    const confirmationPassword = document.getElementById(
        "confirmation-password"
    );

    form.addEventListener("submit", function (event) {
        let validateInput = true;

        if (!verifyPassword(currentPassword.value)) {
            // console.log("email invalido: " + currentPassword.value);
            document.getElementById("error-message").innerHTML =
                "Os campos em vermelho devem ser válidos";
            currentPassword.style.transition = "ease-in-out 0.3s";
            currentPassword.style.border = "solid 1px #f07560";
            validateInput = false;
            event.preventDefault();
        } else {
            console.log(currentPassword.value);
            currentPassword.style.border = "solid 1px #cccccc";
        }
        if (!verifyPassword(newPassword.value)) {
            // console.log("username invalido: " + newPassword.value);
            document.getElementById("error-message").innerHTML =
                "Os campos em vermelho devem ser válidos";
            newPassword.style.transition = "ease-in-out 0.3s";
            newPassword.style.border = "solid 1px #f07560";
            validateInput = false;
            event.preventDefault();
        } else {
            console.log(newPassword.value);
            newPassword.style.border = "solid 1px #cccccc";
        }
        if (!verifyPassword(confirmationPassword.value)) {
            // console.log("password invalido: " + confirmationPassword.value);
            document.getElementById("error-message").innerHTML =
                "Os campos em vermelho devem ser válidos";
            confirmationPassword.style.transition = "ease-in-out 0.3s";
            confirmationPassword.style.border = "solid 1px #f07560";
            validateInput = false;
            event.preventDefault();
        } else {
            console.log(confirmationPassword.value);
            confirmationPassword.style.border = "solid 1px #cccccc";
        }

        if(newPassword.value != confirmationPassword.value){
            document.getElementById("error-message").innerHTML =
                "A nova senha e a confirmação devem ser iguais";
            confirmationPassword.style.transition = "ease-in-out 0.3s";
            confirmationPassword.style.border = "solid 1px #f07560";
            validateInput = false;
            event.preventDefault();
        }

        // if (validateInput) {
        //     console.log("submit");
        //     event.submit();
        // } else {
        //     console.log("nao valido");
        // }
    });
});
