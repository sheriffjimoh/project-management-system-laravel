<?php

namespace App\Http\Controllers;

use App\Task;
use App\Company;
use App\User;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $tasks =Task::orderBy('created_at', 'DESC')->get();
       $companies =Company::orderBy('created_at', 'DESC')->get();
       $users = User::orderBy('created_at', 'DESC')->get();
       $projects =project::orderBy('created_at', 'DESC')->get();

        return view('admin.tasks',[
            'tasks' => $tasks,
             'companies' => $companies,
              'users' => $users,
               'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

  $validatedData = $request->validate([
    'taskname' => ['required', 'max:255'],
    'company' => ['required'],
    'project' => ['required'],
    'user' => ['required'], 
    'days' => ['required'],
    'hours' => ['required']
      ]);
        $values = array(
     
       'name' => $request->input('taskname'),
       'company_id' => $request->input('company'),
       'project_id' => $request->input('project'),
       'user_id' => $request->input('user'),
       'days' => $request->input('days'),
       'hours' => $request->input('hours')
       
          );
         $insert = Task::create($values);

       if($insert){
        // return back();

    return redirect('tasks')->with('status', '1 more task Added successfuly!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
          $task = Task::find($task->id);
      
    return   view('admin.task-details', ['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        //
        $task = Task::find($task->id);
      $companies =Company::orderBy('created_at', 'DESC')->get();
       $users = User::orderBy('created_at', 'DESC')->get();
       $projects =project::orderBy('created_at', 'DESC')->get();

        return view('admin.tasks',[
            'edit_task'=>$task,
             'companies' => $companies,
              'users' => $users,
               'projects' => $projects,
        ]);

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
        //
        $validatedData = $request->validate([
    'taskname' => ['required', 'max:255'],
    'company' => ['required'],
    'project' => ['required'],
    'user' => ['required'], 
    'days' => ['required'],
    'hours' => ['required']
      ]);


         $affected = DB::table('tasks')
              ->where('id', $task->id)
              ->update([
       'name' => $request->input('taskname'),
       'company_id' => $request->input('company'),
       'project_id' => $request->input('project'),
       'user_id' => $request->input('user'),
       'days' => $request->input('days'),
       'hours' => $request->input('hours')   ]);
        
     if($affected){
      
    return redirect('tasks')->with('status', '1  tasks updated  successfuly!');
                 }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
         $delete =  DB::table('tasks')->where('id', $task->id)->delete();

       if($delete){
      
       return redirect('tasks')->with('status', '1  task deleted  successfuly!');

       }
    }
}
