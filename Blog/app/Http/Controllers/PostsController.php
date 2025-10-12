<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts')->with('posts', $posts);
    }

    public function showAdd()
    {
        $categories = Category::all();
        return view('admin.post_add')->with('categories', $categories);
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'contenido_post' => 'required|string', 
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        'category_id' => 'required|exists:categories,id',
    ], [
        'title.required' => 'El título es obligatorio.',
        'description.required' => 'La descripción es obligatoria.',
        'contenido_post.required' => 'El contenido es obligatorio.', 
        'img.image' => 'El archivo debe ser una imagen válida.',
        'category_id.required' => 'La categoría es obligatoria.',
    ]);

    $filename = null;
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('posts/'), $filename);
    }

    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->img = $filename;
    $post->content = $request->contenido_post; 
    $post->likes = 0;
    $post->user_id = Auth::user()->id;
    $post->category_id = $request->category_id;
    $post->save();

    return redirect()->back()->with('success', 'Post agregado correctamente.');
}

    public function show(Post $post)
    {
        return view('admin.post_show', ['post' => $post]);
    }
}
