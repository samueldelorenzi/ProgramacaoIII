@extends('layouts.app')

@section('title', 'Lista de Posts')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Novo Post
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($posts->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Data de Criação</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name ?? 'Sem Categoria' }}</td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir este post?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    @else
        <div class="alert alert-warning">Nenhum post encontrado.</div>
    @endif
</div>
@endsection
