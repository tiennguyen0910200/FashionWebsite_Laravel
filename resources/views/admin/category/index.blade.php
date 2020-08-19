<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>
<style>
    table, td, th {
      border: 1px solid black;
    }
    
    table {
      border-collapse: collapse;
      width: 30%;
    }
    
    th {
      height: 50px;
    }
    th:first-child{
        width: 30px;
    }
    th:last-child{
        width: 150px;
    }
    .form-add{
      margin-bottom: 30px
    }
    .btn{
      width: 80px;
      padding:5px 20px;
      color: white;
      border: none;
    }
    .btn-add{      
      background: #00bcd4;
    }
    
    .contain-button{
      display: flex;
    }
    .contain-button button{
      margin-left: 20px;
    }
    </style>
<body>
        <div class="container">
          <h1>Category Management</h1>
                <div class="form-add">
                        <form action="/admin/category" method="POST">
                          @csrf
                               <label for="inputItem">Name Category</label>
                               <input type="text" name="name-category">
                               <button type="submit" class="btn btn-add">Submit</button> 
                        </form>
                </div>
                <div class="show-category">
                    <table>
                        <tr>
                          <th>ID</th>
                          <th>Name Category</th>
                          <th></th>
                        </tr>
                        @foreach ($category as $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->name}}</td>
                          <td class="contain-button">
                            <form action="/admin/category/{{$item->id}}/edit" method="get">
                                <button class="btn-edit">Edit</button>
                              </form>
                            <form action="/admin/category/{{$item->id}}" method="post">
                              @csrf
                              @method('DELETE')
                                <button class="btn-delete">Delete</button>
                              </form>
                           </td>
                        </tr> 
                        @endforeach
                        
                    </table>
                </div>
        </div>
</body>
</html>