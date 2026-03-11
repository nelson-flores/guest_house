<?php
namespace App\Dto\UserUi;

class UserRegisterDTO
{
    public function __construct(
        public string $name,
        public string $last_name,
        public string $phone,
        public ?string $email = '',
        public string $password,
        public ?int $gender = null,
    ) {
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'password'=>$this->password,
            'gender'=>$this->gender
        ];
    }
}
