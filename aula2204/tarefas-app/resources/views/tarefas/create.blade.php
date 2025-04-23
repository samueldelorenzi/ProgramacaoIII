@extends('layouts.tarefas')
@section('content')
<h1>Nova Tarefa</h1>
<form method="POST" action="{{ route('tarefas.store') }}">
	@csrf
	<input type="text" name="titulo" placeholder="Digite a tarefa">
	<button type="submit">Salvar</button>
</form>
@if ($errors->any())
	<div>
		@foreach ($errors->all() as $erro)
			<p>{{ $erro }}</p>
		@endforeach
	</div>
@endif
@endsection
