@extends('layouts.app')
@section('content')

<div style="padding-top:1%">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item" style="margin-right:5px;">
                <select id="colourselect" class="form-select" size="1">
                    <option value="All">All</option>
                    <option value="Blue">Blue</option>
                    <option value="Red">Red</option>
                    <option value="Green">Green</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Orange">Orange</option>
                </select>
            </li>
            <li class="nav-item me-2">
                <button id="checkOut" onclick="window.location.href='{{ route('scorder.checkout') }}'" type="button" class="btn btn-primary navbar-btn center-block">
                    Check Out
                </button>
            </li>
            <li class="nav-item me-2">
                <button id="emptycart" type="button" class="btn btn-primary">
                    Empty Cart
                </button>
            </li>
            <li class="nav-item text-white me-2">
                🛒
            </li>
            <li class="nav-item">
                <div class="navbar-text text-white" id="shoppingcart">{{ $totalItems }}</div>
            </li>
            <li class="nav-item">
                <div class="navbar-text text-white ms-1">Item(s)</div>
            </li>
        </ul>
    </nav>
</div>

@include('flash::message')

<div class='d-flex flex-wrap align-content-start bg-light'>

@foreach($products as $product)

<div class="p-2 border col-4 g-3 allcolours {{ $product->colour }}">

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

<script>
$(document).ready(function () {
    $(".addItem").click(function () {
        var i = $(this).val();

        $.ajax({
            url: "{{ url('product/additem') }}/" + i,
            type: "GET",
            success: function (response) {
                $('#shoppingcart').text(response.total);
            },
            error: function () {
                alert("Problem communicating with the server");
            }
        });
    });
});

$("#emptycart").click(function () {
    $.ajax({
        type: "GET",
        url: "{{ url('product/emptycart') }}",
        success: function () {
            $('#shoppingcart').text(0);
        },
        error: function () {
            alert("Problem communicating with the server");
        }
    });
});

$("#colourselect").on('change', function () {
    var colour = $(this).find(":selected").val();

    if (colour == 'All') {
        $('.allcolours').show();
    } else {
        $('.allcolours').hide();
        $('.' + colour).show();
    }
});
</script>

@endsection('content')