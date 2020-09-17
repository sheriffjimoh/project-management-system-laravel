<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $comments = Comment::orderBy('created_at', 'DESC')->get();

        return view('admin.comments',['comments' => $comments]);
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
    'url' => ['max:200'],
    'body' => ['required'] ]);
      
        $values = array(
     
       'url' => $request->input('url'),
        'body' => $request->input('body'),
         'user_id' => $user
          );
         $insert = Comment::create($values);

       if($insert){
        // return back();

    return redirect('comments')->with('status', '1 more comments Added successfuly!');
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
         $delete =  DB::table('comments')->where('id', $comment->id)->delete();
       if($delete){
      
    return redirect('comments')->with('status', '1  comment deleted  successfuly!');
       }
    }
}
