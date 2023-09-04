<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a product</h1>
    <div class="">
        @if($errors->all())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('product.store')}}" >
        @csrf
        @method('post')
        <div class="">
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Name" />
        </div>
        <div class="">
            <label for="">Qty</label>
            <input type="text" name="qty" placeholder="Qty" />
        </div>
        <div class="">
            <label for="">Price</label>
            <input type="text" name="price" placeholder="Price" />
        </div>
        <div class="">
            <label for="">Description</label>
            <input type="text" name="description" placeholder="Description" />
        </div>
        <div class="">
            <input type="submit" value="Save a New Product" />
        </div>
    </form>
</body>
</html>