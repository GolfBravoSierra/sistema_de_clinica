<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    
    public function manipulateUsers(User $user): bool
    {
        return $user->permicao === 3;
    }
}
