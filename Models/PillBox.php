<?php
class PillBox implements PillBoxInterface{
    public function __construct(
        private int $id,
        private int $userId,
        private int $compartments,
    ){}
    public function getId(): int{
        return $this->id;
    }
    public function getUserId(): int{
        return $this->userId;
    }
    public function getCompartments(): int{
        return $this->compartments;
    }
    public function addPillToCompartment() {
        // Add pill to compartment logic
    }
    public function removePillToCompartment() {
        // Remove pill to compartment logic
    }
}