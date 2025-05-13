@extends('layouts.app')

@section('title', 'Ver Post')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Post: {{ $post->title }}</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <p><strong>Categoria:</strong> {{ $post->category->name ?? 'Sem Categoria' }}</p>
            <p><strong>Data de Criação:</strong> {{ $post->created_at->format('d/m/Y') }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir este post?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection
