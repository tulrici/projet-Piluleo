<?php
interface NotificationInterface {
    public function createNotification();
    public function sendNotification();
    public function getNotification();
}