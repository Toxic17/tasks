<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;



class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(5);
        return view('index',['tasks'=>$tasks]);
    }
    public function store_view()
    {

        $users = User::all();
        return view('create',['users'=>$users]);
    }
    public function store(StoreTaskRequest $request)
    {
          $task = Task::create($request->validated());
          return redirect()->back()->with('success', 'Task added');
    }
    public function edit_view($taskId)
    {
        $task = Task::where('id','=',$taskId);
        $users = User::all();
        return view('edit',['users'=>$users,'task'=>$task->first(),'id'=>$taskId]);
    }
    public function edit($taskId,EditTaskRequest $request)
    {
        $task = Task::where('id','=',$taskId);
        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id,
            'completed'=>$request->completed,
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('success', 'Task edit');
    }

    public function edit_api($taskId,Request $request)
    {

        $task = Task::where('id','=',$taskId);

        $task->update([
            'completed'=>$request->completed,
        ]);

        return response('success');
    }


    public function delete($taskId)
    {
        $task = Task::where('id','=',$taskId);
        $task->delete();
        return redirect()->back()->with('success', 'Task delete');
    }

}
