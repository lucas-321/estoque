@extends('admin.layouts.app')


@section('title', 'Gestão de Produto')

@section('content')

<h1>Produto {{ $product->name}}</h1>


<ul style="list-style-type: none;">
    <li><strong>Nome: </strong>{{$product->name}}</li>
    <li><a href="{{ route('products.altera', $product->id) }}"><strong>Quantidade: </strong>{{$product->qtd}}</a></li>
    <li><strong>Custo: </strong>{{$product->cost}}</li>
    <li><strong>Valor: </strong>{{$product->valor}}</li>
    <li><strong>Descrição: </strong>{{$product->description}}</li>
    <li><strong>Localização: </strong>{{$product->loc}}</li>
</ul>

<form action="{{route('products.destroy', $product->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar o produto {{$product->name}}</button>
</form>
<hr>
<a href="{{route('products.index')}}"><button class="btn btn-success">Voltar</button></a>
@endsection