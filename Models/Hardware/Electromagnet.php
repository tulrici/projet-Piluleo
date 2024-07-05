<?php
namespace App\Hardware;

class Button {
    public function __construct(
        private int $pin= 0
    ) {}

    function toggle_electromagnet($state) {
        $command = escapeshellcmd("Hardware/Electromagnet.py $state");
        $output = shell_exec($command);
        echo $output;
    }
}