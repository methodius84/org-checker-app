<?php

namespace App\Exceptions;

use Exception;

class InvalidInnException extends Exception
{
    protected $message = 'The given inn is not valid';
    protected $code = 404;
}
