<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\LoginUser;
use App\Http\Resources\Login\UserCollection;
use App\Http\Resources\Login\UserResource;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.createuser',[
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        User::create([
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password')

        ]);
        return redirect('Users')->with('status','Created Successfully');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(int $userID)
    {
        return view('users.editusers',[
            'users'=>User::all()->where('id',$userID),
            'userID' => $userID
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {

    }

    public function update(Request $request,  int $usersID)
    {
        $edit = User::find($usersID);
        $edit->name = $request->input('name');
        $edit->address = $request->input('address');
        $edit->email = $request->input('email');
        $edit->update();
        return redirect('Users')->with('status','Updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\User  $customer
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $customer,int $usersID)
    {
        $delete = User::find($usersID);
        $delete->delete();
        return redirect('Users')->with('status','Deleted Successfully');


    }
}
