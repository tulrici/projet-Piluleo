<?php
namespace App\Hardware;

class Button {
    public function __construct(
        private int $pin= 0
    ) {}
    public function isPressed(){
        // renvoi True si bouton pressé
    }
    public function isPressedLong(){
        // renvoi True si bouton pressé (5 secondes)
    }
}