<?php
namespace App\Hardware;

class StepMotor {
    public function __construct(
        array $controlPins = [0,0,0,0]
    ) {}
    function rotateOnce($direction) {
        $command = escapeshellcmd("Hardware/rotateStepMotor.py $direction");
        $output = shell_exec($command);
        echo $output;
    }
}