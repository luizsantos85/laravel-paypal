@extends('shop.layouts.app')

@section('title', 'Meu Carrinho')
@section('content')

<h1 class="title"><i class="bi bi-cart"></i> Meu Carrinho:</h1>
<div class="row justify-content-center">
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
            @for ($i = 0; $i < 4; $i++) <tr>
                <td>
                    <div class="productItemTable">
                        <img src="{{asset('assets/img/tmp/mouse.jpg')}}" alt="image_product">
                        <p>My Product Name</p>
                    </div>
                </td>
                <td>R$ 30,00</td>
                <td>
                    <a href="" class="itemAddRemove"><i class="bi bi-plus-circle"></i></a>
                    2
                    <a href="" class="itemAddRemove"><i class="bi bi-dash-circle"></i></a>
                </td>
                <td>R$ 60,00</td>
                </tr>
                @endfor
        </tbody>
    </table>

    <div class="total ">
        <h2>Total: R$ 60,00</h2>
        <a href="" class="btn btn-success">Finalizar compra</a>
    </div>

</div>

@endsection