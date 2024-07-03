<?php
class User implements UserInterface {

    public function __construct(
        private int $id = 0,
        private string $firstName = '',
        private string $lastName = '',
        private string $password = NULL,
        private string $email = '',
    ) {}

    public function login(){

    }
    public function logout(){

    }
    public function register(){

    }
    public function updateProfile() {
    }





    public function getId():int {
        return $this->id;
    }
    public function getFirstName(): string {
        return $this->firstName;
    }
    public function getLastName(): string {
        return $this->lastName;
    }
    public function getPassword(): string {
        return $this->password;
    }
    public function getEmail(): string {
        return $this->email;
    }
}
