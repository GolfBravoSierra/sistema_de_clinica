<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AppointmentPolicy
{

    public function update(User $user, Appointment $appointment): bool
    {
        return ($user->permicao === 3
        || $user->id === $appointment->psicologo->id
        || $user->id === $appointment->paciente->id
        );
    }

    public function destroy(User $user, Appointment $appointment): bool
    {
        return ($user->permicao === 3
        || $user->id === $appointment->psicologo->id
        || $user->id === $appointment->paciente->id
        );
    }
}
