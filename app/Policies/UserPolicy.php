<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function view(User $user, User $paciente): bool
    {
        return ($user->permicao === 3 || $paciente->psicologo->id === $user->id);
    }

    public function manipulateUsers(User $user): bool
    {
        return $user->permicao === 3;
    }
}
