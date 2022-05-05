@extends('shop.layouts.app')
@section('title', 'Login')

@section('content')
<div class="align-items-center">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-center">
                    <img class="logomarca" src="{{asset('assets/img/Logomarca.png')}}" alt="LHSCODE">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col-md-12 form-group mb-3">
                            <label for="email" class="col-form-label text-md-end">{{ __('E-mail')
                                }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-12 mb-3 form-group">
                            <label for="password" class="col-form-label text-md-end">Senha</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Logar
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Esqueceu a senha?
                                </a>
                                @endif

                                <a class="btn btn-link text-center" href="{{ route('register') }}">
                                    Ainda não tem cadastro? Cadastre-se!
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection