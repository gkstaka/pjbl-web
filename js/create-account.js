
const submitButton = document.getElementById("submit")
const form = document.getElementById("create-account")
function verifyUserName(userName){
    userNameRegex = /^[a-zA-Z0-9]+$/
}

function verifyEmail(email){
    emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]/
    return emailRegex.test(email)
}

function verifyPassword(password) { 
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-=+_{}\[\]|;:.,<>?/])[A-Za-z\d!@#$%^&*()\-=+_{}\[\]|;:.,<>?/]{8,}$/;

}

form.addEventListener('submit', function(event){
    let email = document.getElementById("email")
    let userName = document.getElementById("username")
    let password = document.getElementById("password")
    if (!verifyEmail(email.value)){
        document.getElementById("error-message").innerHTML = "Os campos em vermelho devem ser válidos"
        email.style.transition = "ease-in-out 0.3s"
        email.style.border = "solid 1px #f07560"
        event.preventDefault()
    }
    if (!verifyUserName(userName.value)){
        document.getElementById("error-message").innerHTML = "Os campos em vermelho devem ser válidos"
        userName.style.transition = "ease-in-out 0.3s"
        userName.style.border = "solid 1px #f07560"
        event.preventDefault()
    }
    else{
        userName.style.border = "solid 1px #f07560"
    }
    if (!verifyPassword(password.value)){
        document.getElementById("error-message").innerHTML = "Os campos em vermelho devem ser válidos"
        password.style.transition = "ease-in-out 0.3s"
        password.style.border = "solid 1px #f07560"
        event.preventDefault()
    }
})



// submitButton.onclick = function(){
//     let email = document.getElementById("email").value
//     if (!verifyEmail(email)){
//         document.getElementById("error-message").innerHTML = "Email invalido"
        
//     }
    
    
// }
