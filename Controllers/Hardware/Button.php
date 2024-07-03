<?php
namespace App\Hardware;

class Button {
    public function __construct(
        private int $pin
    ) {}
    public function isPressed(): bool{
    }
}