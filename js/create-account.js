
const submitButton = document.getElementById("submit")

function verifyEmail(email){
    emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]/
    return emailRegex.test(email)
}

function verifyPassword(password) { 
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-=+_{}\[\]|;:.,<>?/])[A-Za-z\d!@#$%^&*()\-=+_{}\[\]|;:.,<>?/]{8,}$/;

}

submitButton.onclick = function(){
    let email = document.getElementById("email").value
    if (!verifyEmail(email)){
        alert("E-mail invalido")
    }
    
    
}
