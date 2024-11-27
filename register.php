<?php
// register.php

// Chemin du fichier où enregistrer les utilisateurs
$file = 'users.txt';

// Récupérer les données POST
$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

// Vérifier si tous les champs sont remplis
if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
    die('Tous les champs sont requis.');
}

// Vérifier l'adresse e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Adresse e-mail invalide.');
}

// Vérifier le mot de passe
if ($password !== $confirmPassword) {
    die('Les mots de passe ne correspondent pas.');
}

// Hasher le mot de passe
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Enregistrer l'utilisateur
$newUser = "$username|$email|$hashedPassword\n";

if (file_put_contents($file, $newUser, FILE_APPEND)) {
    echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
} else {
    echo "Erreur lors de l'inscription. Veuillez réessayer.";
}
?>