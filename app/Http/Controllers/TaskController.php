<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks=Task::where('user_id',Auth::id())->get();
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(view: 'tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validation=$request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'due_date'=>'required',
            'is_completed'=>'required'
        ]);
        Task::create([
            'title'=>$validation['title'],
            'description'=>$validation['description'],
            'due_date'=>$validation['due_date'],
            'is_completed'=>$validation['is_completed'],
            'user_id'=>Auth::id(),
        ]);
        // dd($request->title);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
        //dd($task);
        $validation=$request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'due_date'=>'required',
            'is_completed'=>'required'
        ]);
        $task->update($validation);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
