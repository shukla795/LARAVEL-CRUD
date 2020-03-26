<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\post;
use DB;
//use Redirect;
use Illuminate\Support\Facades\Redirect;
class pagecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //return post::all();


       //want to individual post
        //return post::where('title','POST TWO')->get();

   //USE DBMS QUERY
    //$post=DB::select('select * from posts');
       // return $post;
       $post=post::orderby('title','desc')->get();
       //$post=post::orderby('title','desc')->take(1)->get();
       //$post=post::orderby('title','desc')->paginate(1);
       return view('posts.index')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*    NOT WORKING
             this.validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);*/

        $validatedata=$request->validate([
            'title'=>'required|unique:posts|max:255',
             'body'=>'required',
        ]);
        //return $validatedata;

        $post= new post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->save();

       // not working
       //return rediect("/posts")->with('success','POST CREATED');
       //return "Success";
      // return redirect()->back()->withMessage('SUCCESS');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // return 'VALUE';
        //return post::all($id);
       $post= post::find($id);

       return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=post::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedata=$request->validate([
            'title'=>'required|unique:posts|max:255',
             'body'=>'required',
        ]);
        //return $validatedata;

        $post=post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->save();

       // not working
       //return rediect("/posts")->with('success','POST CREATED');
       //return "Success";
      return redirect()->back()->withMessage('SUCCESS');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= post::find($id);
        return view('posts.delete')->with('post',$post);
        $post->delete();
        return redirect()->back()->withMessage('SUCCESS');
    }
}
