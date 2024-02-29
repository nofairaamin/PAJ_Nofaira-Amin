<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        //$tasks = DB::table('tasks')->get();
        return view('task.index',compact('tasks'));
    }

    public function create(){
        return view('task.create');
    }

    public function show(Task $task){
        return view('task.show',compact('task'));
    }

    public function edit($id){
        $tasks= Task::findOrFail($id);
        return view('task.edit', compact('tasks'));
    }

    public function delete (Task $task){
        $task->delete();
        return redirect('/task');
    }

    public function update(Request $request, $id){
        $tasks = Task::findOrFail($id);
        $tasks->update($request->all());
        return redirect('/task');
    }


    public function store(TaskRequest $request){
        $validatedData = $request->validated();
    
        // Pastikan description tersedia sebelum menyimpannya
        $description = $request->input('description', ''); 
    
        $task = new Task();
        $task->name = $validatedData['name'];
        $task->description = $description; // Assign description
        $task->save();
    
        return redirect('/task');
    }
    
    
}