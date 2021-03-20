<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    
    public function index()
    {
        $data['allData'] = User::all();
        return view('backend.pages.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'usertype' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        
        $users = new User();
        $users->name = $request->name;
        $users->usertype = $request->usertype;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();
        return redirect()->route('user.create')->with('toast_success', 'A New User Added Successfully');
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
        $editData = User::find($id);
        return view('backend.pages.users.edit', compact('editData'));
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
        
        $users = User::find($id);
        $users->name = $request->name;
        $users->usertype = $request->usertype;
        $users->email = $request->email;
        $users->save();
        return redirect()->route('user.index')->with('toast_success', 'User Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        if(!is_null($user))
        {
            if(file_exists('images/users/'.$user->image) AND !empty($user->image))
            {
                unlink('images/users/'.$user->image);
            }
            
            $user->delete();
        }
        return redirect()->back()->with('toast_success', 'User Data Deleted Successfully');
    }
}
