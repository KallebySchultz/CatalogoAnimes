document.getElementById('register-form').addEventListener('submit', function(event) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
        event.preventDefault(); // Impede o envio do formulário
        alert('As senhas não coincidem. Por favor, tente novamente.');
    }
});
