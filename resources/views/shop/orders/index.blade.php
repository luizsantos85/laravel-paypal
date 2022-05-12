@extends('shop.layouts.app')

@section('title', 'Meus Pedidos')
@section('content')

<h1 class="title"><i class="bi bi-bag"></i> Meus Pedidos:</h1>
<div class="row justify-content-center">

    @include('shop.components.alerts')

    <table class="table table-hover table-striped align-items-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Total</th>
                <th>Realizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->total}}</td>
                <td>{{date('d/m/Y',strtotime($item->created_at))}}</td>
                
                <td>
                    <a href=""><i class="bi bi-basket2"></i> Ver produtos</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="20">Nenhum pedido cadastrado!</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection