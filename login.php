<?php

// Exemple d'utilisateurs pour la démo (utilisez une base de données dans un vrai projet)
$users = [
    "admin" => "password123",
    "user1" => "mypassword",
];

// Récupérer les données du formulaire
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Vérifier si les champs ne sont pas vides
if (empty($username) || empty($password)) {
    die('Tous les champs sont requis.');
}

// Vérifier les identifiants
if (array_key_exists($username, $users) && $users[$username] === $password) {
    echo "Connexion réussie. Bienvenue, $username!";
} else {
    echo "Identifiant ou mot de passe incorrect.";
}
?>
