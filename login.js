document.getElementById('loginForm').addEventListener('submit', function(e) {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const errorDiv = document.getElementById('error');

    // Vérification basique
    if (username === '' || password === '') {
        e.preventDefault();
        errorDiv.textContent = 'Tous les champs sont requis.';
        return;
    }

    // Optionnel : Ajoutez d'autres validations ici (ex : longueur minimale du mot de passe)
    if (password.length < 6) {
        e.preventDefault();
        errorDiv.textContent = 'Le mot de passe doit contenir au moins 6 caractères.';
        return;
    }

    errorDiv.textContent = ''; // Réinitialise le message d'erreur
});
