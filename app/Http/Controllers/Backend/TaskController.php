<?php

namespace App\Http\Controllers\Backend;

use App\Models\Auth\User;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('user')->get();

        return view('backend.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('backend.task.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => request('assigned_user'),
            'completed' => request('completed') ?? 0
        ]);

        // dd($task);
        return redirect('/admin/task');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = User::all();
        //dd($task);
        return view('backend.task.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $valid = request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $request->completed ? $valid['completed'] = true : $valid['completed'] = false;
        //dd($valid);
        $task->update($valid);
        return redirect('/admin/task');
    }

    public function show(Task $task)
    {
        $users = User::all();
        //dd($task);
        return view('backend.task.show', compact('task', 'users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/admin/task');
    }
}
