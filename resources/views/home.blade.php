@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('O que deseja fazer?') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('products.store')}}" class="btn btn-info">Produtos</a>
                    <a href="/register" class="btn btn-success">Novo Usuário</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
