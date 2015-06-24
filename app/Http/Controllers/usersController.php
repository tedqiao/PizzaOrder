<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
class usersController extends Controller
{
    
    function __construct() {
        $this->user=new users();
    }
    
    public function create()
    {
        switch ($this->user->validation()){
            case 1://name dup
               return view('register.register',['res'=>1]);  
            case 2://empty input
               return view('register.register',['res'=>2]);
           default :
               return view('register.register',['res'=>10]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
