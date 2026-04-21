<?php

namespace App\Middleware;

use App\Auth;

class AdminMiddleware
{
    public static function handle(): array
    {
        return Auth::requireAdmin();
    }
}