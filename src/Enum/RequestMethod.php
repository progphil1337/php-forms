<?php

declare(strict_types=1);

namespace Progphil1337\PhpForms\Enum;

/**
 * RequestMethod
 *
 * @package Progphil1337\PhpForms\Enum
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
enum RequestMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
    case OPTIONS = 'OPTION';
}