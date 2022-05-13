@extends('shop.layouts.app')

@section('title', 'Meus Pedidos')
@section('content')

<h1 class="title"><i class="bi bi-bag"></i> Detalhes do pedido: {{$order->id}}</h1>
<div class="row justify-content-center">

    @include('shop.components.alerts')

    <table class="table table-hover table-striped align-items-center">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>
                    <div class="productItemTable">
                        <img src="{{asset("assets/img/tmp/{$product->image}")}}" alt="image_product">
                    </div>
                </td>
                <td>{{$product->title}}</td>
                <td>{{$product->pivot->quantity}}</td>
                <td>R$ {{number_format($product->pivot->price,2,',','.')}}</td>

            </tr>

            @endforeach
        </tbody>
    </table>

    <div class="col-md-12">
        <a href="{{route('orders')}}" class="btn btn-primary">Voltar</a>
    </div>

</div>

@endsection