<?php
namespace App\Dto\UserUi;

class UserLoginDTO
{
    public function __construct(
        public string $username,
        public string $password,
        public bool $remember = false
    ) {
    }


    public function toArray(): array
    {
        return [
            'phone' => $this->username,
            'password' => $this->password,
            'remember' => $this->remember,
        ];
    }
}
