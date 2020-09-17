<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $companies = Company::orderBy('created_at', 'DESC')->get();
         $projects = Project::orderBy('created_at', 'DESC')->get();

        return view('admin.projects',[
            'projects' => $projects,
             'companies' => $companies
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
         $user = auth()->user()->id;
         $validatedData = $request->validate([
        'name' => ['required', 'max:255'],
        'company_id' => ['required'],
        'days' => ['required', 'max:3'],
        'description' => ['required']
                                             ]);
          
        $values = array(
     
       'name' => $request->input('name'),
       'company_id' => $request->input('company_id'),
       'days' => $request->input('days'),
        'description' => $request->input('description'),
         'user_id' => $user
          );
         $insert = Project::create($values);

       if($insert){
    
    return redirect('projects')->with('status', '1 more project Added successfuly!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
     return   view('admin.projects-details', ['project'=>$project]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //

         $project = Project::find($project->id);
    $companies = Company::orderBy('created_at', 'DESC')->get();
    return   view('admin.projects', [
        'edit_project'=>$project,
        'companies'=>$companies
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $validatedData = $request->validate([
        'name' => ['required', 'max:255'],
        'company_id' => ['required'],
        'days' => ['required', 'max:3'],
        'description' => ['required']
                                             ]);


         $affected = DB::table('projects')
              ->where('id', $project->id)
              ->update([
        'name' => $request->input('name'),
        'company_id' => $request->input('company_id'),
        'days' => $request->input('days'),
        'description' => $request->input('description')   ]);
        
     if($affected){
      
    return redirect('projects')->with('status', '1  project updated  successfuly!');
                 }
   }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //

         $delete =  DB::table('projects')->where('id', $project->id)->delete();
       if($delete){
      
    return redirect('projects')->with('status', '1  project deleted  successfuly!');
       }
    }
}
