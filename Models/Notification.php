<?php
class Notification implements NotificationInterface {
    public function __construct(
        private int $id,
        private int $userId,
        private $message,
        private string $type,
        private $timestamp,
    ) {}

    public function createNotification(){

    }
    public function sendNotification(){

    }
    public function getNotification(){

    }
}