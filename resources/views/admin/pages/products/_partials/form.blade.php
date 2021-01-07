@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <input type="text" name="name" placeholder="Nome:" value="{{ $product->name ?? old('name')}}">
</div>
<div class="form-group">
    <input type="text" name="description" placeholder="Descrição:" value="{{ $product->description ?? old('description')}}">
</div>
<div class="form-group">
    <input type="text" name="cost" placeholder="Custo:" value="{{ $product->cost ?? old('cost')}}">
</div>
<div class="form-group">
    <input type="text" name="valor" placeholder="Valor:" value="{{ $product->valor ?? old('valor')}}">
</div>
<div class="form-group">
    <input type="number" name="qtd" placeholder="Quantidade:" value="{{ $product->qtd ?? old('qtd')}}">
</div>
<div class="form-group">
    <input type="text" name="loc" placeholder="Localização:" value="{{ $product->loc ?? old('loc')}}">
</div>
<div class="form-group">
    <input type="file" name="image" >
</div>