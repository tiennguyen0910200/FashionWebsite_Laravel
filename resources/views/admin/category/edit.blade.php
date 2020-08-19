<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
</head>
<body>
            <form action="/admin/category" method="POST">
                @method('PATCH')
                @csrf
                    <label for="inputItem">Name Category</label>
                    <input type="text" hidden value="{{$category->id}}" name="id-category">
                    <input type="text" value="{{$category->name}}" name="name-category">
                    <button type="submit" class="btn-add">Update</button> 
            </form>
</body>
</html>