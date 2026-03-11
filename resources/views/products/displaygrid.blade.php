@extends('layouts.app')
@section('content')
@include('flash::message')

<div class='d-flex flex-wrap align-content-start bg-light'>

@foreach($products as $product)

<div class="p-2 border col-4 g-3">

<div class="card text-center">

<div class="card-header d-block">
<h5 class="mx-auto d-block">
{{ $product->name }} {{ $product->description }}
</h5>
</div>

<div class="card-body">
<img style="width:65%;height:200px;" 
class="mx-auto d-block" 
src="{{ asset('/img/' . $product->image) }}"/>
</div>

<div class="card-footer">
<button id="addItem" type="button"
class="btn btn-success mx-auto d-block addItem"
value="{{$product->id}}">
Add To Cart
</button>
</div>

</div>

</div>

@endforeach

</div>

@endsection('content')