@extends('shop.layouts.app')
@section('title', 'Meu Perfil')
@section('content')


<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-secondary text-center">
                <h1 class="title text-light"><i class="bi bi-file-lock"></i> Atualizar senha:</h1>
            </div>

            <div class="card-body">

                @include('shop.components.alerts')

                <form action="{{route('profile.updatePass')}}" method="POST" class="form">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nova Senha:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="name">Confirmar nova senha</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Atualizar senha</button>

                </form>

            </div>
        </div>
    </div>
</div>




@endsection