<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('aluno.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aluno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Aluno::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'cpf' => $request->input('cpf'),
            'data_nascimento' => $request->input('data_nascimento')
        ]);

        return redirect()->route('alunos.index')
                         ->with('success', "Cliente criado com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('aluno.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
