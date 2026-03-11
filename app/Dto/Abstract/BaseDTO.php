<?php
namespace App\Dto\Abstract;

abstract class BaseDTO
{

    abstract public function __construct(array $data);

    public static function getInstance(array $array): self
    {
        return new static($array);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
    
    
}