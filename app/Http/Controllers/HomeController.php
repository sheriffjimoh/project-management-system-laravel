<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $company = DB::table('companies')->count();
         $project = DB::table('projects')->count();
          $role = DB::table('roles')->count();
           $task = DB::table('tasks')->count();
        return view('admin.home', [
            'company' => $company,
            'project' => $project,
            'role' => $role,
            'task' => $task

        ]);
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
