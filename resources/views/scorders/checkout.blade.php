@extends('layouts.app')

@section('content')
<h2>Place Order</h2>

<form action="{{ route('scorder.placeorder') }}" method="POST">
    @csrf

    <table class="table table-condensed table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Colour</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $ttlCost = 0; $ttlQty = 0; @endphp

            @foreach ($lineitems as $lineitem)
                @php $product = $lineitem['product']; @endphp
                <tr>
                    <td>
                        <input size="3" style="border:none" type="text" name="productid[]" readonly value="{{ $product->id }}">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->colour }}</td>
                    <td><div class="price">{{ $product->price }}</div></td>
                    <td>
                        <input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="{{ $lineitem['qty'] }}">
                    </td>
                    <td>
                        <button type="button" class="btn btn-default add">+</button>
                        <button type="button" class="btn btn-default subtract">-</button>
                        <button type="button" class="btn btn-default remove" onclick="$(this).closest('tr').remove();">x</button>
                    </td>

                    @php
                        $ttlQty = $ttlQty + $lineitem['qty'];
                        $ttlCost = $ttlCost + ($product->price * $lineitem['qty']);
                    @endphp
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-3">
        <strong>Total Quantity:</strong> {{ $ttlQty }}
    </div>

    <div class="mb-3">
        <strong>Total Cost:</strong> {{ $ttlCost }}
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection