<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post criado com sucesso!');
    }

    public function show(string $id)
    {
        $post = Post::with('category')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deletado com sucesso!');
    }
}
