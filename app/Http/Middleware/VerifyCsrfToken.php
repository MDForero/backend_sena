<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [

        'api/orders/',
        'api/orders/*',
        'api/invoices/',
        'api/invoices/*',
        'api/invoices',
        'api/materials/',
        'api/materials/*',
        'api/materials',
        'api/users/*',
    ];
}
