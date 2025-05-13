@extends('layouts.tarefas')
@section('content')
<h1>Minhas Tarefas</h1>
<a href="{{ route('tarefas.create') }}">Nova Tarefa</a>
<ul>
@foreach ($tarefas as $tarefa)
	<li>
		{{ $tarefa->titulo }}
		<form method="POST" action="{{ route('tarefas.destroy', $tarefa) }}" style="display:inline;">
			@csrf
			@method('DELETE')
			<button type="submit">Excluir</button>
		</form>
		<form method="POST" action="{{ route('tarefas.update', $tarefa) }}" style="display:inline;">
			@csrf
			@method('PUT')
			<button type="submit">Concluir</button>
		</form>
	</li>
@endforeach
</ul>
<a href="{{ route('tarefas.filtro', ['status' => 'pendentes']) }}">Pendentes</a> |
<a href="{{ route('tarefas.filtro', ['status' => 'concluidas']) }}">Concluídas</a> |
<a href="{{ route('tarefas.index') }}">Todas</a>
@endsection
