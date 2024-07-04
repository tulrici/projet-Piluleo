<?php
class HealthData implements HealthDataInterface {
    public function __construct(
        private int $id,
        private int $userId,
        private int $timestamp
    ) {}
    function addHealthData(){
        // add add healthData logic
    }
    function getHealthData() {
        // add get healthData logic
    }
    function updateHealthData(){
        // add update healthData logic
    }
}