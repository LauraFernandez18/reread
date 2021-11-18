function login() {
    email = document.getElementById('email').value
    password = document.getElementById('password').value
    mensaje = document.getElementById('mensaje')
    campo = document.getElementById('email')
    campo2 = document.getElementById('password')

    if (email == '' && password == '') {
        mensaje.innerHTML = 'Introduce el email y la contraseña'
        campo.style.borderColor = "red"
        campo2.style.borderColor = "red"
        return false
    } else if (email == '') {
        mensaje.innerHTML = 'Introduce el email'
        campo.style.borderColor = "red"
        return false
    } else if (password == '') {
        mensaje.innerHTML = 'Introduce la contraseña'
        campo2.style.borderColor = "red"
        return false
    } else {
        campo.style.borderColor = "#4CAF50"
        campo2.style.borderColor = "#4CAF50"
        return true
    }
}