<?php
namespace App\Hardware;

class Button {
    public function __construct(
        private int $pin= 0
    ) {}

    // Example usage Button (to be done)
    function run_button_push_script() {
        $command = escapeshellcmd("Hardware/pushButton.py");
        $output = shell_exec($command);
        echo $output;
    }

    public function isPressed(){
        // renvoi True si bouton pressé
    }
    public function isPressedLong(){
        // renvoi True si bouton pressé (5 secondes)
    }
}