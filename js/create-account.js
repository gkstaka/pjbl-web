
const submitButton = document.getElementById("submit")

function verifyEmail(email){
    emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]/
    return emailRegex.test(email)
}

submitButton.onclick = function(){
    let email = document.getElementById("email").value
    if (!verifyEmail(email)){
        alert("E-mail invalido")
    }
}