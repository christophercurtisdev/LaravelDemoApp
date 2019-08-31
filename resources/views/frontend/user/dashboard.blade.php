@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    @foreach ($tasks as $task)
        <task-card>        
            <template slot="title">{{ $task->title }}</template>
            <template>{{ $task->body }}</template>
        </task-card>
    @endforeach
@endsection
