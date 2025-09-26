@extends('admin.layouts.main')

@section('contenido')
    <h1>Usuarios</h1>

    <div class="p-4">
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
                Nuevo Usuario
            </button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nickname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Img</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>*******</td>
                        <td>{{ $item->img }}</td>
                        <td><button class="btn btn-danger">X</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Añadir Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/dashboard/users" method="POST" >
                    @csrf <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre:</label>
                            <input type="submit " class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-form-label">Nickname:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="img" class="col-form-label">Imagen:</label>
                            <input type="file" class="form-control-file" id="img" name="img">
                        </div>
                    </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Tu script
</script>
@endsection