<?php

namespace App\Auth;

use Illuminate\Auth\SessionGuard;

class UnhashedSessionGuard extends SessionGuard
{
    protected function hasValidCredentials($user, $credentials): bool
    {
        return !is_null($user) && $credentials['password'] == $user->getAuthPassword();
    }
}
