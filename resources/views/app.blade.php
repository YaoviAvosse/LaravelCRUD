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
            
            @foreach($todos as $todo)
            <li class="list-group-item">
                {{ $todo->todo }}
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">
                    Edit
                </button>
                <form action="{{ url('todos/'.$todo->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>

                <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
                    <div class="card card-body">
                        <form action="{{ url('todos/'.$todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="todo" value="{{ $todo->todo }}">
                            <button class="btn btn-secondary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </li>
            @endforeach

            <hr>

            <h2>Pending todos</h2>
            @if (session('status'))
            <div class="alert alert-sucess">
                    {{ session ('status')}}
            </div>
            @endif
            <ul class="list-group">
            @foreach($todos as $todo)
                <li class="list-group-item">{{ $todo->todo }}</li>
            @endforeach
            </ul>
            <hr>

            <h2>Completed todos</h2>

                </div>
            
            </div>
    </div>
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
