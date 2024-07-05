<?php

namespace App\Hardware;

class LED {
    public function __construct(
        public int $pin = 0
    ) {}
    public function toggleLED($state) {
        $command = escapeshellcmd("Hardware/toggleLED.py $state");
        $output = shell_exec($command);
        echo $output;
    }
    public function blink($duration, $frequency) {
        $state = false;
        if($state == true)
        for ($i = 0; $i < $duration; $i++) {
            $this->toggleLED($state);
            // logic de temporisation/2
            $this->toggleLED($state);
            // logic de temporisation/2
        }
    }
}