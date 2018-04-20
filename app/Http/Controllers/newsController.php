<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->name  =$request->name;
        $blog->description =$request->description;
      if($request->hasFile('resume')){

dd($request->hasFile('resume'));
                // in update we will check first if user has an image or not to be replaced 


                // dd($request->file('logo'));
                $logo = $request->file('resume'); 
                $extension = $logo->getClientOriginalExtension();
                $logo_rename = time() . '.' .$logo->getClientOriginalExtension(); 



                $logo->move(public_path('uploads/blog'), $logo_rename) ; 


                // Storage::disk('local')->put("/users/".$logo_rename ,  File::get($logo));  
                $blog->image = $logo_rename ; 

        }
        $blog->save();

        return $blog;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
