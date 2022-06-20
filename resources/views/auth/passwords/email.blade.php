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
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="user-box">

                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label>Email</label>

                </div>


               
                <button type="submit">ENVIAR</button>


            </form>
        </div>

    </main>
</div>
@endsection