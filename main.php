<?php

require_once 'Models/User.php';
use App\Models\User;


//register new user (first time connexion)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Info du formulaire
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User(firstName: $firstName, lastName: $lastName, email: $email, password: $password);

    // Tentative de New User
    if ($user->createUser($firstName, $email, $password)) {
        // Si creation ok, redirection vers la page de login
        header("Location: login.php?success=1");
        exit;
    } else {
        // Si creation nok, redirection vers la page de register avec un message d'erreur
        //utiliser le view pour afficher le message d'erreur
        header("Location: register.html?error=1");
        exit;
    }
}

//login
//Choper les infos du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

$User = New User(email: $email, password: $password);

//Si le login est bon, on redirige vers la page d'accueil
if ($User->login()){
header("Location: home.php");
exit;
}
else{
//Sinon on redirige vers la page de login avec un message d'erreur
//utiliser le view pour afficher le message d'erreur
header("Location: login.php?error=1");
exit;
}

