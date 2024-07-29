<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
<h1>Edit a product</h1>

<div>
    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ol>
    @endif
</div>
<div class="container">
<form action="{{route('products.update', ['product' => $product])}}" method="post">
    @csrf
    @method('put')
    <div class="row  justify-content-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <input type="text" name="name"  class="form-control" placeholder="Enter Name" value="{{$product->name}}">
            </div>
            <div class="col-md-12">
                <input type="number" name="qty" class="form-control"  placeholder="Enter qty" value="{{$product->qty}}">
            </div>
            <div class="col-md-12">
                <input type="number" name="price"  class="form-control" placeholder="Enter price" value="{{$product->price}}">
            </div>
            <div class="col-md-12">
                <textarea name="description" rows="10" class="form-control" placeholder="Enter Description">
                    {{$product->description}}
                </textarea>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-warning p-2 col-12" value="Update">
            </div>
        </div>
    </div>
    </form>
</div>

</body>
</html>