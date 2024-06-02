<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date' => 'date:d-m-Y',
            'time' => 'timestamp:H:i'
        ];
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(User::class)->where('permicao', 1);
    }
    public function psicologo(): BelongsTo
    {
        return $this->belongsTo(User::class)->where('permicao', 2);
    }
}
