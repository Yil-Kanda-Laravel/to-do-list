@extends("layouts.app") 
@section("content")
    <div class="container">
        
        <div class="col-md-6">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done !!!</strong> {{ session()->get('message') }} 
            <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
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
            <h4>In Process</h4>
            <ul>
                <li style="list-style: none">
                    @foreach($tasks as $task)
                    <p><a href="{{url('/'.$task->id.'/complete')}}">{{ $task->name }} <span class="check fa fa-check"></span></a></p>
                    @endforeach
                </li>
            </ul>
            <h4>Completed</h4>
            <ul>
                <li style="list-style: none">
                    @foreach($completed_tasks as $c_task)
                    <p><a href="{{url('/'.$c_task->id.'/delete')}}">{{ $c_task->name }} <span class="delete fa fa-times"></span></a></p>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
@endsection
