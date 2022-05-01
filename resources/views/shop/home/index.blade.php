@extends('shop.layouts.app')

@section('title', 'Home')
@section('content')


<h1 class="title"><i class="bi bi-shop mx-4"></i>Últimos produtos adicionados:</h1>

<div class="row justify-content-center">
    @for ($i = 0; $i < 4; $i++) <article class="col-md-3 col-sm-6 col-xm-12">
        <div class="productItem">
            <img src="{{asset('assets/img/tmp/mouse.jpg')}}" alt="image_product">
            <h2>Mouse Logitech</h2>
            <a href="" class="btn btn-buy">Adicionar ao carrinho <i class="bi bi-cart"></i></a>
        </div>
        </article>
        <article class="col-md-3 col-sm-6 col-xm-12">
            <div class="productItem">
                <img src="{{asset('assets/img/tmp/fone.jpg')}}" alt="image_product">
                <h2>Phone Fortrek</h2>
                <a href="" class="btn btn-buy">Adicionar ao carrinho <i class="bi bi-cart"></i></a>
            </div>

        </article>
        <article class="col-md-3 col-sm-6 col-xm-12">
            <div class="productItem">
                <img src="{{asset('assets/img/tmp/teclado.jpg')}}" alt="image_product">
                <h2>Teclado Mecânico</h2>
                <a href="" class="btn btn-buy">Adicionar ao carrinho <i class="bi bi-cart"></i></a>
            </div>

        </article>
        @endfor
</div>




@endsection

{{-- @push('scripts')
<script>
    alert('Oi')
</script>
@endpush --}}