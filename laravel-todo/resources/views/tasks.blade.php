@extends('layouts.app')

@section('content')
{{--    Bootstrap Boilerplate--}}

    <div class="panel-body">
{{--        Display Validation Errors--}}
    @include('common.errors')
{{--        New Task Form--}}
        <form action="{{url('task')}}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}
{{--            Task Name--}}
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="tex" name="name" id="task-name" class="force-control">
                </div>
            </div>
{{--            Add Task Button--}}
       <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <Button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i>Add Task
                </Button>
            </div>
       </div>

        </form>
    </div>
{{--    Current Task--}}
    @if(count($tasks)>0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
{{--                    Table heading--}}
                    <thead>
                    <th>Task</th>
                    <th>Delete</th>
                    </thead>
{{--                    Table Body--}}
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
{{--                            Task Name--}}
                            <td class="table-text">
                                <div>{{$task->name}}</div>
                            </td>
{{--                            Delete Button--}}
                            <td>
                                <form action="{{url('task/'.$task->id)}}" method="POST">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}

                                    <button>Delete Task</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
