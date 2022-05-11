@extends('shop.layouts.app')

@section('title', 'Meu Carrinho')
@section('content')

<h1 class="title"><i class="bi bi-cart"></i> Meu Carrinho:</h1>
<div class="row justify-content-center">

    @include('shop.components.alerts')

    <table class="table table-hover table-striped align-items-center">
        <thead>
            <tr>
                <th>Item</th>
                <th>Preço</th>
                <th>Qtd.</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)

            <tr>
                <td>
                    <div class="productItemTable">
                        <img src="{{asset("assets/img/tmp/{$product['item']->image}")}}" alt="image_product">
                        <p>{{$product['item']->title}}</p>
                    </div>
                </td>
                <td>{{number_format($product['item']->price,2,',','.')}}</td>
                <td>
                    <a href="{{route('add.cart',$product['item']->id)}}" class="itemAddRemove"><i
                            class="bi bi-plus-circle"></i></a>
                    {{$product['qtd']}}
                    <a href="{{route('remove.cart',$product['item']->id)}}" class="itemAddRemove"><i
                            class="bi bi-dash-circle dash"></i></a>
                </td>
                <td>R$ {{number_format($product['item']->price * $product['qtd'],2,',','.')}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="20">Carrinho vazio!</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="total ">
        <h2>Total: R$ {{$total}}</h2>
        @if (Session::has('cart') && Session::get('cart')->totalItems() > 0)
        <a href="{{route('paypal')}}" class="btn btn-primary mt-4"><i class="bi bi-paypal"></i> Pagar com Paypal</a>
        @endif
    </div>

</div>

@endsection