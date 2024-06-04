<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class PostController extends Controller
{
    public function create()
    {
        return Inertia::render('Patients',
        ['posts' => Post::all()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes=$request->all();
        $post=Post::factory()->create($attributes);
        return redirect('/patients');
    }

    public function update(Request $request, Post $post)
    {
        //$aluno = Aluno::findOrFail($request->id);
        //$aluno->update($request->all());
        //return redirect('/aluno')->with('sucesso','As informações do aluno foram alteradas');
    }

    public function destroy(Post $post)
    {
        //$aluno = Aluno::findOrFail($request->id);
        //$aluno->delete();
        //return redirect('/aluno')->with('sucesso','O aluno foi deletado');
    }
}
