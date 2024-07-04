<?php
class Pill {
    public function __construct(
        private int $id,
        private string $name,
        private string $takingTime,
        private int $dosage,
        private int $freqency,
        private int $userId
    ) {}
    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getDosage(): int {
        return $this->dosage;
    }
    public function getFrequency(): int {
        return $this->freqency;
    }
    public function getUserId(): int {
        return $this->userId;
    }
private function addPill(){
    // Add pill to database logic
}
}