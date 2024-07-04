<?php
class User implements UserInterface {

    public function __construct(
        private int $id = 0,
        private string $firstName = '',
        private string $lastName = '',
        private string $password = NULL,
        private string $email = '',
    ) {}

    public function login(){
            // Assuming you have a MySQL connection established
            $host = 'localhost';
            $username = 'your_username';
            $password = 'your_password';
            $database = 'your_database';

            // Create a new PDO instance
            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

            // Prepare the SQL statement
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");

            // Bind the parameters
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);

            // Execute the query
            $stmt->execute();

            // Fetch the result
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if a user was found
            if ($user) {
                // Set the user properties
                $this->id = $user['id'];
                $this->firstName = $user['first_name'];
                $this->lastName = $user['last_name'];
                $this->password = $user['password'];
                $this->email = $user['email'];

                // Return true to indicate successful login
                return true;
            } else {
                // Return false to indicate failed login
                return false;
            }
    }
    public function logout(){
        // Close the PDO connection
        $pdo = null;
    }
    public function register(){

    }
    public function updateProfile() {
        // Assuming you have a MySQL connection established
        $host = $_ENV['DB_HOST'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $database = $_ENV['DB_DATABASE'];
        
        // Create a new PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        
        // Prepare the SQL statement
        $stmt = $pdo->prepare("UPDATE users SET first_name = :firstName, last_name = :lastName, email = :email WHERE id = :id");
        
        // Bind the parameters
        $stmt->bindParam(':firstName', $this->firstName);
        $stmt->bindParam(':lastName', $this->lastName);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);
        
        // Execute the query
        $stmt->execute();
        
        // Close the PDO connection
        $pdo = null;
    }


    
    public function getId():int {
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
}
