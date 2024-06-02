<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function create(User $user): bool
    {
        return $user->permicao === 1;
    }
    
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->paciente()->id;
    }

    public function destroy(User $user, Post $post): bool
    {
        return $user->id === $post->paciente()->id
        || $user->permicao === 3;
    }
}
