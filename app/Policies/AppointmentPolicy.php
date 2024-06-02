<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AppointmentPolicy
{
    public function view(User $user, Appointment $appointment): bool
    {
        return ($user->permicao === 3
        || $user->id === $appointment->psicologo()->id
        || $user->id === $appointment->paciente()->id
        );
    }

    public function create(User $user): bool
    {
        return ($user->permicao >= 2);
    }

    public function update(User $user, Appointment $appointment): bool
    {
        return ($user->permicao === 3
        || $user->id === $appointment->psicologo()->id
        );
    }

    public function destroy(User $user, User $professional): bool
    {
        return ($user->permicao === 3
        || $user->id === $appointment->psicologo()->id
        || $user->id === $appointment->paciente()->id
        );
    }
}
