@extends('shop.layouts.app')
@section('title', 'Meu Perfil')
@section('content')

<h1 class="title"><i class="bi bi-person-badge"></i> Meu Perfil:</h1>


<form action="" class="form">
    @csrf

    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="Luiz Henrique" class="form-control">
    </div>
    <div class="form-group mt-3">
        <label for="name">E-mail:</label>
        <input type="email" name="email" value="luiz.santos85@gmail.com" class="form-control" disabled>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Atualizar</button>

</form>


@endsection