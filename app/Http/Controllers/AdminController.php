<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = User::where('type', 'admin');
        //  auth()->user()->manager; 
        return view('admin.index' , compact('managers')); 
        // return view('admin.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addManager');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:managers|max:255',
            'phone' => 'required',
            'email' => 'required',
            'nationalID' => 'required',
        ]);
        $managers= new User();
        $managers->name = $request->name;
        $managers->phone = $request->phone;
        $managers->email = $request->email;
        $managers->nationalID = $request->nationalID;
        $managers->user_id = Auth::id();
        $managers->save();
        return redirect('/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));

        $this->authorize('update', $id);
 
        return view('edit', ['manager'=> $id]);
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
        $request->validate([
            'name'=>'required',
            'phone'=> 'required|numeric|unique:users,phone,'.$id,
            
            ]);
            
            
            $user = User::find($id);
            // Rule::unique('phone')->ignore($contact);
            $user->name  = $request->get('name');
            $user->phone = $request->get('phone');
            $user->email = $request->get('email');
            $user->NationalID = $request->get('NationalID');
            $user->save();
            return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/home'); 
    }

    public function chart(){
        return view('admin.chart'); 
    }
}
