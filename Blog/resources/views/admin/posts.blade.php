@extends('admin.layouts.main')
@section('contenido')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Posts</h1>
        <a href="{{ route('posts.add') }}" class="btn btn-dark">Agregar Post</a>
    </div>

    <hr>

    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-4 mb-4"> 
                <div class="card">
                    <img src="{{ asset($post->img) }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Ver Post</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <p>No hay posts para mostrar todavía.</p>
            </div>
        @endforelse
    
@endsection