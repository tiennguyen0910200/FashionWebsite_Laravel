<!doctype html>
<html lang="en">
 
<head>
    <title>Add Product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
    div form {
        display: inline;

    }

    .update {
        display: none;

    }

    table,
    td {
        border: 1px solid black;
        padding: 10px;
        height: 170px;
    }

    th {
        border: 1px solid black;
    }

    table {
        border-spacing: 5px;
        width: 100%;
    }
    </style>
<body style="height: 100%; width: 90%; margin: auto;">
    <div style="height: 50%; width: 40%; margin: auto;">
        <h1 style="text-align: center;">Add Product</h1>
        <form action="/admin/product" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name product</label>
                <input type="text" class="form-control" id="" placeholder="Title" name="name">
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
                <input type="file" class="form-control" id="" placeholder="image" name="image">
            </div>
            <div class="form-group">
                <label for="">Old price</label>
                <input type="text" class="form-control" id="" placeholder="Old price" name="oldPrice">
            </div>
 
            <div class="form-group">
                <label for="">New price</label>
                <input type="text" class="form-control" id="" placeholder="New price" name="price">
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="text" class="form-control" id="" placeholder="Quantity" name="quantity">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="description" name="description">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
                <table>
                    <tr>
                    <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Old price</th>
                        <th>New price</th>
                         <th>Quantity</th>  
                        <th>Description</th>
                        <th></th>
                        
                    </tr>
                    <?php $i=1;?>
                    @foreach ($products as $product)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $product->name}} </td>
                        <td> {{ $product->category->name}} </td>  
                        <td><img src="{{$product->image}}" style="height:170px; width:150px; "></td>               
                        <td> {{ $product->oldPrice }} </td>
                        <td> {{ $product->price }} </td>
                        <td> {{ $product->quantity}} </td>  
                        <td>{{ $product->description }}</td>
                    
                        <td>
                            <form action="{{'/admin/product/'.$product->id.'/edit'}}" method="GET">
                                <button type="submit" class="btn btn-link">Edit</button>
                            </form>
                        
                            <form action="{{'/admin/product/'.$product->id}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
    </div>
 
</body>
 
</html>
