<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
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
    </style>
</head>
<body>
        <div >
          <h1>User Management</h1>
                <div >
                    <table >
                        <tr>
                          <th>ID</th>
                          <th>Name User</th>
                          <th>Email User</th>
                          <th>Password User</th>
                          <th></th>
                        </tr>
                        @foreach ($user as $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->password}}</td>
                          <td>
                          <form action="/admin/user/{{$item->id}}" method="post">
                              @csrf
                              @method('DELETE')
                                <button type="submit">Delete</button>
                              </form>
                          </td>
                        </tr> 
                        @endforeach
                        
                    </table>
                </div>
        </div>
</body>
</html>