<?php
namespace App\Dto;

class NotificationTypeDTO extends \App\Dto\Abstract\BaseDTO
{
    public bool $user_enabled = true;
    public ?string $user_message = null;
    public bool $sms_enabled = true;
    public ?string $sms_message = null;
    public bool $email_enabled = true;
    public ?string $email_message = null;
    public bool $is_templated_email = false;
   
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
