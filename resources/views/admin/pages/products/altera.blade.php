@extends('admin.layouts.app')


@section('title', 'Quantidade em Estoque')

@section('content')

<h1>Quantidade do Produto {{$product->name}}</h1>
    <hr>
<form action="{{ route('products.muda', $product->id) }}" method="get" class="form">
    
    <div class="form-group">
        <p>Inserir</p>
        <input type="number" name="op1" placeholder="" value="0">
    </div>
    
    <hr>

    <div class="form-group">
        <p>Retirar</p>
        <input type="number" name="op2" placeholder="" value="0">
    </div>

    {{-- <div class="form-group">
        <input type="number" name="qtd" placeholder="Quantidade:" value="{{ $product->qtd }}">
    </div> --}}
    
    <button type="submit" class="btn btn-primary">Modificar</button>
</form><br>
<hr>
<a href="{{route('products.index')}}"><button class="btn btn-success">Voltar</button></a>
{{-- <form action="muda.php" method="get">
    <label for="">Retira</label>
    <input type="number" name="op2" placeholder="Retirar" value="0">
    <button type="submit">Modificar</button>
</form> --}}

@endsection
