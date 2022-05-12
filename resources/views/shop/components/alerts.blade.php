@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <h5><i class="bi bi-dash-circle"></i> Ocorreu um Erro!</h5>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif

@if (session('message'))
<div class="alert alert-warning" role="alert">
    {{session('message')}}
</div>
@endif