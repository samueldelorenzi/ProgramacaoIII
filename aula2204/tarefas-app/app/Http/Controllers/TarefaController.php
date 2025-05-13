<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::where('user_id', auth()->id())->get();

        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
        ]);
        Tarefa::create([
            'titulo' => $request->titulo,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('tarefas.index');
    }
    public function destroy(string $id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();
        return redirect()->route('tarefas.index');
    }
    public function filtro($status)
    {
        $usuario = auth()->user();
        if ($status === 'concluidas') {
            $tarefas = Tarefa::where('user_id', $usuario->id)
                ->where('concluida', true)
                ->get();
        } elseif ($status === 'pendentes') {
            $tarefas = Tarefa::where('user_id', $usuario->id)
                ->where('concluida', false)
                ->get();
        } else {
            $tarefas = Tarefa::where('user_id', $usuario->id)->get();
        }
        return view('tarefas.index', compact('tarefas'));
    }
    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->update(['concluida' => true]);
        dd($tarefa);
        return redirect()->route('tarefas.index');
    }
}
