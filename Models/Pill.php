<?php
class Pill {
    private PDO $db;
    public function __construct(
        private int $id,
        private string $name,
        private string $takingTime,
        private int $dosage,
        private int $userId,
    ) {
        // Initialize PDO connection
        $this->db = $this->initializePDO();    
    }
        // Replace your_username, your_password, your_database with your actual database credentials
        private function initializePDO(): PDO {
            $host = 'localhost';
            $username = 'your_username';
            $password = 'your_password';
            $database = 'your_database';
    
            return new PDO("mysql:host=$host;dbname=$database", $username, $password);
        }
    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getDosage(): int {
        return $this->dosage;
    }
    public function getUserId(): int {
        return $this->userId;
    }
private function addPill() {
    // Prepare the SQL statement
    $stmt = $this->db->prepare("INSERT INTO pills (name, taking_time, dosage, user_id) VALUES (?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bindParam(1, $this->name);
    $stmt->bindParam(2, $this->takingTime);
    $stmt->bindParam(3, $this->dosage);
    $stmt->bindParam(4, $this->userId);

    // Execute the statement
    $stmt->execute();
}
private function getAllPills(): array {
    // Prepare the SQL statement
    $stmt = $this->db->prepare("SELECT * FROM pills WHERE user_id = ?");
    // Bind the parameter
    $stmt->bindParam(1, $this->userId);
    // Execute the statement
    $stmt->execute();
    // Fetch all the rows as associative arrays
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Return the result
    return $rows;
}
private function getPillsByUserId(int $userId): array {
    // Prepare the SQL statement
    $stmt = $this->db->prepare("SELECT * FROM pills WHERE user_id = ?");
    // Bind the parameter
    $stmt->bindParam(1, $userId);
    // Execute the statement
    $stmt->execute();
    // Fetch all the rows as associative arrays
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Return the result
    return $rows;
}

private function deletePill(int $id): void {
    // Prepare the SQL statement
    $stmt = $this->db->prepare("DELETE FROM pills WHERE id = ?");
    // Bind the parameter
    $stmt->bindParam(1, $id);
    // Execute the statement
    $stmt->execute();
}

}