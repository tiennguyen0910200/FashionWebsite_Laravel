<!doctype html>
<html lang="en">
 
<head>
    <title>Edit Photo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
 
<body style="height: 100%; width: 90%; margin: auto;">
    <div style="height: 50%; width: 40%; margin: auto;">
        <h1 style="text-align: center;">Edit Product</h1>
        <form action="{{'/admin/product/'.$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" placeholder="Name" name="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                    <option label="{{$category->name}}"  value="{{$category->id}}" ></option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" id="" placeholder="image" name="image" value="{{$product->image}}">
            </div>
           
            <div class="form-group">
                <label for="">Old price</label>
                <input type="text" class="form-control" id="" placeholder="Old price" name="oldPrice"  value="{{$product->oldPrice}}">
            </div>
            <div class="form-group">
                <label for="">New price</label>
                <input type="text" class="form-control" id="" placeholder="New price" name="price"  value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" class="form-control" id="" placeholder="Quantity" name="quantity"  value="{{$product->quantity}}">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="description" name="description" value="{{$product->description}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
</body>
 
</html>