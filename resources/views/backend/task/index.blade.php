@extends('backend.layouts.app')

@section('title', app_name() . ' | Task Management')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Task Management
                </h4>
            </div>

            <div class="col-sm-7 pull-right">
                @include('backend.task.includes.header-buttons')
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Associated User</th>
                            <th>Completed</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->body }}</td>
                            <td>{{ $task->user->full_name }}</td>
                            <td>{{ $task->completed ? 'Complete' : 'Incomplete' }}</td>
                            <td>
                                <form action="/admin/task/{{ $task->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                            <td><a href="{{ route('admin.task.edit', $task) }}" class="btn btn-primary"><i class="fas fa-arrow-right"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
