<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Products</h1>
    @if (session()->has('success'))
        <div>
            <h3>{{session('success')}}</h3>
        </div>
    @endif
    <h1>Trash products</h1>
    <a href="{{route('products.index')}}"> product page</a>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Qty</td>
            <td>price</td>
            <td>Description</td>
            <td>Total</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->qty}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->qty * $product->price}}</td>
                <td><a href="{{ route('products.restore', ['product' => $product]) }}">Restore</a></td>
                <td>
                    <form method="post" action="{{route('products.destroy' , ['product' => $product])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>