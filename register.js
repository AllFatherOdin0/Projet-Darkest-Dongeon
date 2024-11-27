document.getElementById('registerForm').addEventListener('submit', function(e) {
    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirm_password').value.trim();
    const errorDiv = document.getElementById('error');
    const successDiv = document.getElementById('success');

    errorDiv.textContent = '';
    successDiv.textContent = '';

    // Validation des champs
    if (username === '' || email === '' || password === '' || confirmPassword === '') {
        e.preventDefault();
        errorDiv.textContent = 'Tous les champs sont requis.';
        return;
    }

    if (!email.includes('@')) {
        e.preventDefault();
        errorDiv.textContent = 'Veuillez entrer une adresse e-mail valide.';
        return;
    }

    if (password.length < 6) {
        e.preventDefault();
        errorDiv.textContent = 'Le mot de passe doit contenir au moins 6 caractères.';
        return;
    }

    if (password !== confirmPassword) {
        e.preventDefault();
        errorDiv.textContent = 'Les mots de passe ne correspondent pas.';
        return;
    }

    successDiv.textContent = 'Validation réussie. Soumission en cours...';
});