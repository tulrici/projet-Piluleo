<?php

namespace App\Controllers;
use App\Models\User;
require_once 'Models/User.php';

class UserController {

    public function __construct(
        private $db,
        private User $user
    ) {}
    public function login($email, $password) {
        $user = $this->user->getUserByEmail($email);

        if($user && password_verify($password, $user->password)) {
            // Login user
            return true;
        } else {
            // Show error message
            return false;
        }
    }

    public function register($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        return $this->user->createUser($name, $email, $hashedPassword);

    }

    public function updateProfile() {
        // Handle profile update
    }
}
