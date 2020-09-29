<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/api/login',
        '/api/signup',
        '/api/pet/add', // TODO: to be removed
        
        '/api/me',
        '/api/reservations',
        '/api/reservations/*',
        '/api/boardings',
        '/api/pets',
        '/api/visits',
        '/api/visits/cancel',
    ];
}
