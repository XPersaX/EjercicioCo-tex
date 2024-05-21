
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card card-success">
                    @if (session('status'))
                        <div class="text-success">
                            {{session('status')}}
                        </div>
                    @endif 
                    <div class="card-header">
                        <h3 class="card-title text-center">Login</h3>
                    </div>
                        <form action="{{route('login.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <label for="email">Email Usuario:</label>
                                <br>
                                <input class="form-control form-control-lg" type="email"  value="{{ old('email') }}" name="email" placeholder="Email Usuario" >
                                @error('email')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <label for="password">Contraseña</label>
                                <br>
                                <input class="form-control form-control-lg" type="password" name="password" placeholder="password Usuario" >
                                @error('password')
                                <br>
                                <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <input class="p-1" type="checkbox" name="recuerdame">
                                    </div>
                                    <div class="col-auto">
                                        <label>Recuérdame</label>
                                    </div>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button  type="submit" class="btn btn-success" >Ingresar</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


