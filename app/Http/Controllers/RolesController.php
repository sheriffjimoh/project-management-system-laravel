<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $roles = Role::orderBy('created_at', 'DESC')->get();

        return view('admin.roles',['roles' => $roles]);
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

  $validatedData = $request->validate(['name' => ['required', 'max:255'] ]);
      
  $values = array('name' => $request->input('name'));
  $insert = Role::create($values);

  if($insert){
        // return back();
   return redirect('roles')->with('status', '1 more role Added successfuly!');
           }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    $role = Role::find($role->id);
      
    return   view('admin.roles', ['edit_role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    $validatedData = $request->validate(['name' => ['required', 'max:255']]);

    $update = DB::table('roles')
    ->where('id', $role->id)
    ->update(['name' => $request->input('name')]);
        
    if($update){
 
    return redirect('roles')->with('status', '1  role updated  successfuly!');
  }else{
     return redirect('roles');
  }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
       $delete =  DB::table('roles')->where('id', $role->id)->delete();

       if($delete){
      
       return redirect('roles')->with('status', '1  role deleted  successfuly!');

       }
    }
}
