<?php
namespace App\Hardware;

class StepMotor {
    public function __construct(
        array $controlPins = [0,0,0,0]
    ) {}
    public function rotateOnce(int $steps){
        // logic to rotate motor
    }
}