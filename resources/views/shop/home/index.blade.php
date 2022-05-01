@extends('shop.layouts.app')

@section('title', 'Home')
@section('content')


<h1 class="title"><i class="bi bi-shop mx-4"></i>Últimos produtos adicionados:</h1>

<div class="row justify-content-center">

    @foreach ($products as $product)
    <article class="col-md-3 col-sm-6 col-xm-12 d-flex">
        <div class="productItem">
            <img src="{{asset("assets/img/tmp/{$product->image}")}}" alt="{{$product->title}}">
            <h2>{{$product->title}}</h2>
            <a href="{{route('add.cart', $product->id)}}" class="btn btn-buy">Adicionar ao carrinho <i class="bi bi-cart"></i></a>
        </div>
    </article>
    @endforeach

</div>

@endsection

{{-- @push('scripts')
<script>
    alert('Oi')
</script>
@endpush --}}