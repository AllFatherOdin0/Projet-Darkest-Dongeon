<?php
// login.php

// Chemin du fichier où les utilisateurs sont stockés
$file = 'users.txt';

// Récupérer les données POST
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Vérifier si les champs sont remplis
if (empty($email) || empty($password)) {
    die('Tous les champs sont requis.');
}

// Vérifier si l'adresse e-mail est valide
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Adresse e-mail invalide.');
}

// Charger les utilisateurs
$users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$isValid = false;

foreach ($users as $user) {
    list($storedEmail, $storedPasswordHash) = explode('|', $user);

    // Vérifier si l'utilisateur existe et que le mot de passe est correct
    if ($storedEmail === $email && password_verify($password, $storedPasswordHash)) {
        $isValid = true;
        break;
    }
}

if ($isValid) {
    echo "Connexion réussie. Bienvenue !";
} else {
    echo "Adresse e-mail ou mot de passe incorrect.";
}
?>