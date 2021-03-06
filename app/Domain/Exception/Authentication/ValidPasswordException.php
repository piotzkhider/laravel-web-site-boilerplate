<?php
declare(strict_types=1);

namespace App\Domain\Exception\Authentication;

use Exception;
use ErrorException;

/**
 * Class ValidPasswordException
 * @package App\Domain\Exception\Authentication
 */
class ValidPasswordException extends ErrorException
{
    public function __construct(
        $message = "",
        $code = 0,
        $severity = 1,
        $filename = __FILE__,
        $lineno = __LINE__,
        Exception $previous = null
    ) {
        parent::__construct($message, 500, $severity, $filename, $lineno, $previous);
    }
}
