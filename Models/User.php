<?php
namespace App\Models;

use App\Interfaces\UserInterface;
use PDO;

class User implements UserInterface {

    private PDO $pdo;

    public function __construct(
        private int $id = 0,
        private string $firstName = '',
        private string $lastName = '',
        private string $username = '',
        private string $password = '',
        private string $email = ''
    ) {
        // Initialize PDO connection
        $this->pdo = $this->initializePDO();
    }   
        //replace your_username, your_password, your_database with your our database credentials
    private function initializePDO(): PDO {
        $host = 'localhost';
        $username = 'your_username';
        $password = 'your_password';
        $database = 'your_database';

        return new PDO("mysql:host=$host;dbname=$database", $username, $password);
    }


    public function createUser(string $name, string $email, string $password): bool {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        return $stmt->execute();
    }

    
    public function login(): bool {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $this->id = $user['id'];
            $this->firstName = $user['first_name'];
            $this->lastName = $user['last_name'];
            $this->password = $user['password'];
            $this->email = $user['email'];
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        // Unset user properties or handle session
    }

    public function register(): void {
        // Implement registration logic
    }

    public function updateProfile(): void {
        $stmt = $this->pdo->prepare("UPDATE users SET first_name = :firstName, last_name = :lastName, email = :email WHERE id = :id");
        $stmt->bindParam(':firstName', $this->firstName);
        $stmt->bindParam(':lastName', $this->lastName);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    public function getId(): int {
        return $this->id;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getUserByEmail(string $email): ?self {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $userObject = new self(
                id: $user['id'],
                firstName: $user['first_name'],
                lastName: $user['last_name'],
                password: $user['password'],
                email: $user['email']
            );
            return $userObject;
        }

        return null;
    }

}
