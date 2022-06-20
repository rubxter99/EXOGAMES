@extends('layouts.app')

@section('content')


<div id="resetear">
    <main>
        <input type="checkbox" id="chk">

        <div class="resetear">
            <label for="chk" class="log">RECUPERACIÓN</label>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('password.update') }}">
             @csrf
             <input type="hidden" name="token" value="{{ $token }}">

                <div class="user-box">

                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label>Email</label>

                </div>
                <div class="user-box">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
               
                <button type="submit">RESETEAR</button>


            </form>
        </div>

    </main>
</div>
@endsection