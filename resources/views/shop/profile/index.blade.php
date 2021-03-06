@extends('shop.layouts.app')
@section('title', 'Meu Perfil')
@section('content')


<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-secondary text-center">
                <h1 class="title text-light"><i class="bi bi-person-badge"></i> Meu Perfil:</h1>
            </div>

            <div class="card-body">

                @include('shop.components.alerts')

                <form action="{{route('profile.update')}}" method="POST" class="form">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="name">E-mail:</label>
                        <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control"
                            disabled>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Atualizar</button>

                </form>

            </div>
        </div>
    </div>
</div>




@endsection