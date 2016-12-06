<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/laravel-filemanager',
        '/laravel-filemanager/upload/',
        '/laravel-filemanager/upload?type=Images',
        '/laravel-filemanager?type=Files',
        '/laravel-filemanager/upload?type=Files',
        '/upload-image/'
    ];


}
