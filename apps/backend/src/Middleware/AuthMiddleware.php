<?php

namespace App\Middleware;

use App\Auth;

class AuthMiddleware
{
    public static function handle(): array
    {
        return Auth::requireAuth();
    }
}