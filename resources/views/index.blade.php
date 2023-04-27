<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <h1>Usuarios</h1>
                <div>
                    <div class="card" style="margin: 25px; padding:20px">
                        <h3 style="margin-top: 20px; margin-bottom: 20px">Crear nuevo usuario</h3>
                        <form action="{{route('store')}}" method="POST">
                            {{-- @method('POST') --}}
                            @csrf {{-- le dice a laravel que el formulario es de nuestro proyecto y no de HTLM --}}
                            <label for="">Nombre:</label>
                            <input name="name" class="form-control" type="text" style="margin-bottom: 20px" value="{{old('name')}}">
                            <label for="">Email:</label>
                            <input name="email" class="form-control" type="email" name="" id="" style="margin-bottom: 20px" value="{{old('email')}}">
                            <label for="">Contraseña:</label>
                            <input name="password" class="form-control" type="password" name="" id="" style="margin-bottom: 20px" value="{{old('password')}}">
                            <input class="btn btn-sm btn-success" type="submit" value="Guardar" style="margin-bottom: 20px">
                        </form>
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}} 
                            </div>
                        @endforeach
                            
                        @endif
                    </div>
                </div>
                <h2>Lista de usuarios</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form action="{{route('destroy', $user)}}" method="POST">
                                        @method('DELETE') {{-- envia el metodo correcto a laravel en lugar del metodo post que envia el formulario --}}
                                        @csrf {{-- le dice a laravel que el formulario es de nuestro proyecto y no de HTLM --}}
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar...?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>