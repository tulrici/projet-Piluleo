<?php

namespace App\Hardware;

class LED {
    public function __construct(
        public int $pin = 0
    ) {}
    public function turnOn() {
        // Logic to turn ON the LED
    }
    public function turnOff() {
        // Logic to turn OFF the LED
    }
    public function blink($duration, $frequency) {
        for ($i = 0; $i < $duration; $i++) {
            $this->turnOn();
            // logic de temporisation/2
            $this->turnOff();
            // logic de temporisation/2
        }
    }
}