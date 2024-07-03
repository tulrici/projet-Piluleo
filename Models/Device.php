<?php
class Device implements DeviceInterface{
    private function __construct(
        private int $id,
        private int $userId,
        private string $status,
        private int $lastSync
    ){}
    public function syncDevice(){
        //sync Device logic
    }
    public function getDeviceStatus(){
        return $this->status;
    }
}