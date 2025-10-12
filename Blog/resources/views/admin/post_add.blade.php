@extends('admin.layouts.main')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endsection

@section('contenido')
    <h1>Agregar Post</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" id="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input value="{{ old('description') }}" name="description" type="text" class="form-control" id="description">
        </div>
        
        <div class="form-group">
            <label for="file">Img</label>
            <input name="img" type="file" class="form-control" id="file">
        </div>
        
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        <input type="hidden" name="contenido_post" id="contenido_post">

    <div class="form-group">
        <label for="editor">Content</label>
        <div id="editor" style="height: 200px;">{!! old('contenido_post') !!}</div>
    </div>
    
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Insertar</button>
    </div>
</form>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        const form = document.querySelector('#form');
        
        form.addEventListener('submit', function(e) {
            const contentInput = document.querySelector('#contenido_post');
            
            contentInput.value = quill.root.innerHTML;
        });
    </script>
@endsection