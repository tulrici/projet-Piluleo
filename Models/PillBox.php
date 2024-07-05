<?php
require_once "Models/Hardware/StepMotor.php";
use App\Hardware\StepMotor;
class PillBox implements PillBoxInterface{
    public function __construct(
        private int $id,
        private int $userId,
        private array $compartments,
        private StepMotor $Motor
    ){}
    public function getId(): int{
        return $this->id;
    }
    public function getUserId(): int{
        return $this->userId;
    }
    public function getCompartments(): array{
            return $this->compartments;
        }
    public function addPillToCompartment(Pill $Pill, int $compartment) {
        $this->compartments[$compartment][] = $Pill;
    }
    public function removePillFromCompartment(Pill $Pill, int $compartment) {
        unset($this->compartments[$compartment][array_search($Pill, $this->compartments[$compartment])]);
    }
    public function rotateOnce(){
        $this->Motor->rotateOnce(73); // 73 steps pour 2048steps/7jours/4momentsdelajournée
    }
}