<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <script src="{{ asset('js/app.js')}}" defer></script>
        
        <link href="{{ asset('css/app.css')}}" rel="stylesheet" ></link>

        <title>Laravel CRUD</title>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col md-9">
            <h1>Todos</h1>
             <hr>
        
            <h2>Add new todo</h2>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            
            <form action="{{  url('/todos')  }}" method="POST">
                @csrf
                <input type="text" class="form-control" name="todo" placeholder="Add new todo"/>
                <br>
                <input type="date" class="form-control" name="due_date"/>
                <br>   
                <button class="btn btn-primary" type="submit"> Add</button>
            </form>
            <br>
            
          

            <hr>

            <h2>Pending todos</h2>
           

            <h2>Completed todos</h2>

               
            
        </div>
    </div>
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
