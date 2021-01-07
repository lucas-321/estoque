@extends('admin.layouts.app')

@section('title', "Edição de Produto {$product->name}")
    
@section('content')

    <h1>Editar o Produto {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT') 
        @include('admin.pages.products._partials.form')
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>

    <hr>
    <a href="{{route('products.index')}}"><button class="btn btn-success">Voltar</button></a>
    
@endsection