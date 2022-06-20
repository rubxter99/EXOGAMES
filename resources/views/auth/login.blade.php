@extends('layouts.app')

@section('content')

<!-- <div class=""> -->
<div id="login">
    <main>
        <input type="checkbox" id="chk">

        <div class="signup">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label for="chk" class="sig">REGISTRO</label>

                <div class="user-box">
                    <input id="nombre" type="text" class="@error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label>Nombre</label>
                </div>
                <div class="user-box">

                    <input id="apellidos" type="text" class="@error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                    @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label>Apellidos</label>
                </div>
                <div class="user-box">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    <label>Email</label>
                </div>
                <div class="user-box">

                    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label>Password</label>
                </div>
                <div class="user-box">

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">


                    <label>Confirma tu Password</label>
                </div>

                <button type="submit" name="btnInsertar">REGISTRAR</button>

                <br>
            </form>
        </div>

        <div class="login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="chk" class="log">LOGIN</label>



                <div class="user-box">

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label>Email</label>

                </div>

                <div class="user-box">

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label>Password</label>

                </div>
                <div class="user-box text-white">
                    <td class="izquierda1"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Recordar</td>
                </div>
                <button type="submit">LOGIN</button>

                <div class="user-box">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>

    </main>
</div>




@endsection