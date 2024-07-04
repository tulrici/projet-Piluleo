<?php
interface PillBoxInterface {
    public function addPillToCompartment(Pill $Pill, int $compartment);
    public function removePillFromCompartment(Pill $Pill, int $compartment);
}