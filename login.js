document.getElementById('loginForm').addEventListener('submit', function(e) {
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const errorDiv = document.getElementById('error');

    errorDiv.textContent = '';

    // Validation de l'e-mail
    if (!email.includes('@') || !email.includes('.')) {
        e.preventDefault();
        errorDiv.textContent = 'Veuillez entrer une adresse e-mail valide.';
        return;
    }

    // Validation du mot de passe
    if (password.length < 6) {
        e.preventDefault();
        errorDiv.textContent = 'Le mot de passe doit contenir au moins 6 caractères.';
        return;
    }
});