function verifyEmail(email) {
    // primeiro caracter deve ser uma letra, deve ter pelo menos 3 caracteres antes do @,
    // o ultimo caracter nao deve ser especial, deve haver um @ e um . seguido de dois a quatro caracteres para o domínio
    emailRegex = /^[a-zA-Z][a-zA-Z0-9._-]+[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/
    return emailRegex.test(email)
}

function verifyUserName(userName) {
    // usuário deve ter duas letras e e números podem ser opcionais. Deve começar com uma letra. Caracteres especiais nao inclusos
    userNameRegex = /^[a-zA-Z][a-zA-Z0-9]{3,9}$/
    return userNameRegex.test(userName)
}

function verifyPassword(password) {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-=+_{}\[\]|;:.,<>?/])[A-Za-z\d!@#$%^&*()\-=+_{}\[\]|;:.,<>?/]{8,}$/
    return passwordRegex.test(password)
}

function maskEmail(input) {
    let emailValue = input.value
    const emailMaskRegex = /^[a-zA-Z0-9._@-]/
    // testa se o novo caracter inserido está dentro dos caracteres validos
    if (!emailMaskRegex.test(emailValue[emailValue.length - 1]) || emailValue[emailValue.length - 1] == " ") {
        input.value = emailValue.substring(0, emailValue.length - 1)
    }

}

function maskUser(input) {
    let userValue = input.value
    const userMaskRegex = /^[a-zA-Z0-9]/
    // testa se o novo caracter inserido está dentro dos caracteres validos
    if (!userMaskRegex.test(userValue[userValue.length - 1]) || input.value.length > 10) {
        input.value = userValue.substring(0, userValue.length - 1)
    }
}

function maskPassword(input) { 
    let passwordValue = input.value
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-=+_{}\[\]|;:.,<>?/])[A-Za-z\d!@#$%^&*()\-=+_{}\[\]|;:.,<>?/]{8,}$/
    if (!passwordRegex.test(passwordValue[passwordValue.length =  1]) || passwordValue[passwordValue.length =  1] == " ") {
        input.value = passwordValue.substring(0, passwordValue.length - 1)
    }
}


document.addEventListener("DOMContentLoaded", function () {
    const submitButton = document.getElementById("submit-button")
    const form = document.getElementById("create-account")
    const email = document.getElementById("email")
    const userName = document.getElementById("username")
    const password = document.getElementById("password")


    // email.addEventListener("input", function () {
    //     maskEmail(this)
    // })

    // userName.addEventListener("input", function () {
    //     maskUser(this)
    // })

    // submitButton.addEventListener("click", function () {
    //     console.log("botao clicado")
    // })

    form.addEventListener("submit", function (event) {
        let validateInput = true

        console.log("botao clicado")
        if (!verifyEmail(email.value)) {
            console.log("email invalido: " + email.value)
            document.getElementById("error-message").innerHTML = "Os campos em vermelho devem ser válidos"
            email.style.transition = "ease-in-out 0.3s"
            email.style.border = "solid 1px #f07560"
            validateInput = false
            event.preventDefault()
        }
        else {
            console.log(email.value)
            email.style.border = "solid 1px #cccccc"
        }
        if (!verifyUserName(userName.value)) {
            console.log("username invalido: " + userName.value)
            document.getElementById("error-message").innerHTML = "Os campos em vermelho devem ser válidos"
            userName.style.transition = "ease-in-out 0.3s"
            userName.style.border = "solid 1px #f07560"
            validateInput = false
            event.preventDefault()
        }
        else {
            console.log(userName.value)
            userName.style.border = "solid 1px #cccccc"
        }
        if (!verifyPassword(password.value)) {
            console.log("password invalido: " + password.value)
            document.getElementById("error-message").innerHTML = "Os campos em vermelho devem ser válidos"
            password.style.transition = "ease-in-out 0.3s"
            password.style.border = "solid 1px #f07560"
            validateInput = false
            event.preventDefault()
        }
        else {
            console.log(password.value)
            password.style.border = "solid 1px #cccccc"
        }

        if (validateInput) {
            console.log("submit")
            form.submit()
        }
        else {
            console.log("nao valido")
        }
    })
})