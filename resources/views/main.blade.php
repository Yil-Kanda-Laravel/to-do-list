@extends("layouts.app") 
@section("content")
    <div class="container">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done !!!</strong> {{ session()->get('message') }} 
            <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        <div class="col-md-6">
            <h1>Todo List</h1>
            <form action="{{url('/task')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input class="form-control" name="name" placeholder="Enter Task" type="text">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
            </form>
            <hr>
            <ol>
                <li style="list-style: none">
                    @foreach($tasks as $task)
                    <a href="{{url('/'.$task->id.'/complete')}}">{{ $task->name }}</a>
                    @endforeach
                </li>
            </ol>
            <h4>Completed</h4>
            <ol>
                <li style="list-style: none">
                    @foreach($completed_tasks as $c_task)
                    <a href="{{url('/'.$c_task->id.'/delete')}}">{{ $c_task->name }}</a>
                    @endforeach
                </li>
            </ol>
        </div>
    </div>
@endsection