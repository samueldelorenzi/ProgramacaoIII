@extends('layouts.app')

@section('title', 'Criar Novo Post')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Criar Novo Post</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erros encontrados:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Selecione uma categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar Post</button>
        </div>
    </form>
</div>
@endsection
