<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Tasks::orderBy('id','asc')->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        
        Tasks::create($request->post());

        return redirect()->route('tasks.index')->with('success','Task has been created successfully.');
    }

    public function show(Tasks $task)
    {
        return view('tasks.show',compact('task'));
    }

    public function edit(Tasks $task)
    {
        return view('tasks.edit',compact('task'));
    }

    public function update(Request $request, Tasks $task)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        
        $task->fill($request->post())->save();

        return redirect()->route('tasks.index')->with('success','Task Has Been updated successfully');
    }

    public function destroy(Tasks $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task has been deleted successfully');
    }
}
