
@extends('layout.app')
@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update Task
            </div>
            <div class="panel-body">
                <form action="{{ route('task.update') }}"


                method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')

                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{$tasks->name}}">
                        </div>
                    </div>

                    <!-- Add Update Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-btn fa-info"></i>update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
