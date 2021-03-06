<?php

namespace App\Http\Controllers;

use App\Phonebook;
use App\Http\Requests\PhoneBookRequest;
use Illuminate\Http\Request;
// 
class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('phonebook');
    }

    public function getData(){

        return Phonebook::orderBy('name','DESC')->get();
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
    // here i will use PhoneBookRequest to get validation from it
    
    // to store data in database
    public function store(PhoneBookRequest $request)
    {
    	// validation of these attrubite are in PhoneBookRequest in Request folder
        $phonebook = new Phonebook();
        $phonebook->name =$request->name;
        $phonebook->phone =$request->phone;
        $phonebook->email =$request->email;
        $phonebook->save();

        return $phonebook;
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    // update data returned from vue form
    public function update(PhoneBookRequest $request)
    {
        $phonebook = Phonebook::find($request->id);
        $phonebook->name =$request->name;
        $phonebook->phone =$request->phone;
        $phonebook->email =$request->email;
        $phonebook->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    // to delete defined row
    public function destroy(Phonebook $phonebook)
    {
        Phonebook::where('id',$phonebook->id)->delete();
    }
}
