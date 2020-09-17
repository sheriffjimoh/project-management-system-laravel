<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompaniesController extends Controller
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

        return view('admin.companies',['companies' => $companies]);
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
        $user = auth()->user()->id;
        //process files
    if ($request->hasFile('photo')) {
    
    $extension = $request->photo->extension();
    $filename = $request->input('name').rand().'.'.$extension;
    $path = $request->photo->storeAs('public/images', $filename);
    }
  $validatedData = $request->validate([
    'name' => ['required', 'max:255'],
    'description' => ['required'],
    'photo' => ['required'] ]);
      
        $values = array(
     
       'name' => $request->input('name'),
        'description' => $request->input('description'),
        'photos' => $filename,
         'user_id' => $user
          );
         $insert = Company::create($values);

       if($insert){
        // return back();

    return redirect('companies')->with('status', '1 more company Added successfuly!');
       }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
       // $company =Company::find($company->id);
    return   view('admin.companies-details', ['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        $company = Company::find($company->id);
      
    return   view('admin.companies', ['edit_company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
         $company = Company::find($company->id);
        $present_photo = $company->photos;
        $validatedData = $request->validate(
            [
            'name' => ['required', 'max:255'],
            'description' => ['required']
             ]                      );

      if ($request->hasFile('photo')) {
    
    $extension = $request->photo->extension();
    $filename = $request->input('name').rand().'.'.$extension;
    $path = $request->photo->storeAs('public/images', $filename);
    
    }else{

      $filename = $present_photo ;
    }


         $affected = DB::table('companies')
              ->where('id', $company->id)
              ->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'photos' => $filename]);
        
     if($affected){
      
    return redirect('companies')->with('status', '1  company updated  successfuly!');
       }

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //

       $delete =  DB::table('companies')->where('id', $company->id)->delete();
       if($delete){
      
    return redirect('companies')->with('status', '1  company deleted  successfuly!');
       }

    }
}
