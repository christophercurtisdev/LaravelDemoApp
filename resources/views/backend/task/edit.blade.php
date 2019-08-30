@extends('backend.layouts.app')

@section('title', app_name() . ' | Create Task')

@section('content')

{{ html()->modelForm($task, 'PATCH', route('admin.task.update', $task))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Task Management
                        <small class="text-muted">Edit Task</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Title')
                            ->class('col-md-2 form-control-label')
                            ->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder('Task Title')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Description')
                            ->class('col-md-2 form-control-label')
                            ->for('body') }}
                    
                    <div class="col-md-10">
                            {{ html()->textarea('body')
                            ->class('form-control')
                            ->placeholder('Task Description')
                            ->attribute('maxlength', 800)
                            ->attribute('rows', 10)
                            ->required() }}
                    </div>

                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Assigned User')
                            ->class('col-md-2 form-control-label')
                            ->for('user') }}
                    
                        <div class="col-md-10">
                            <select class="mdb-select md-form" name="assigned_user">
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{ $user->fullName }} - ({{ $user->id }})</option>
                                @endforeach
                            </select>
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row">
                            {{ html()->label('Completed')
                                ->class('col-md-2 form-control-label')
                                ->for('completed') }}
                        
                        <div class="col-md-10">
                            {{ html()->checkbox('completed') }}
                        </div>
    
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.task.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Update') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}

@endsection