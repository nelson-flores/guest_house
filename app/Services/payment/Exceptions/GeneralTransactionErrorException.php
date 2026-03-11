<?php
namespace App\Services\payment\Exceptions;

class GeneralTransactionErrorException extends \Exception
{
    protected $message = "Erro ao processar transação, por favor tente novamente mais tarde.";
}
