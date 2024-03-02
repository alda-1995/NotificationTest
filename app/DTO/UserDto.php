<?php 
namespace App\DTO;

class UserDto{
    public string $name;
    public string $email;
    public string $phoneNumber;
  
    public function __construct(string $name, string $email, 
    string $phoneNumber)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }
}
