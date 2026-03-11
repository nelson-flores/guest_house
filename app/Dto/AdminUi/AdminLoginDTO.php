<?php
namespace App\Dto\AdminUi;

class AdminLoginDTO
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
            'username' => $this->username,
            'password' => $this->password,
            'remember' => $this->remember,
        ];
    }
}
