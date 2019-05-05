<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('view',Auth::user(),User::class);
        $managers = User::all();
        return view('admin.list' , compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Auth::user());
        return view('admin.index'); 
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
            'name' => 'required|unique:users|max:255',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nationalID' => 'required',
        ]);
        $managers= new User();
        $managers->name = $request->name;
        $managers->phone = $request->phone;
        $managers->email = $request->email;
        $managers->password = Hash::make($request['password']);
        $managers->nationalID = $request->nationalID;
        $managers->type = $request->type;
        $managers->save();
        return redirect('/admins');
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
        return view('admin.listManagers', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manager = User::find($id);
        return view('admin.edit', compact('manager'));
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
        $this->authorize('update',Auth::user(),User::class);

        $user = User::find($id);
        $user->update([
            'name' => $request->name ,
            'phone' => $request->phone,
            'email' => $request->email,
            'nationalID' => $request->NationalID,
            'type' => $request->type
        ]);
        return redirect('/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',Auth::user(),User::class);
        User::destroy($id);
        return redirect('/admins');
    }

    public function chart(){
        return redirect('/admins');
        // return view('admin.chart');
    }
}
