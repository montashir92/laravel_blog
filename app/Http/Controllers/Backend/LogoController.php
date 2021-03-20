<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Logo;

class LogoController extends Controller
{
   
    public function index()
    {
        $data['countLogo'] = Logo::count();
        $data['allData'] = Logo::all();
        return view('backend.pages.logos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.logos.create');
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
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:3000',
        ]);
        
        $data = new Logo();
        $data->created_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/logo/', $fileName);
            $data['image'] = $fileName;
        }
        $data->save();
        
        return redirect()->route('user.logo.create')->with('toast_success', 'A New Logo Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Logo::find($id);
        return view('backend.pages.logos.create', $data);
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
        $data = Logo::find($id);
        $data->updated_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink('images/logo/'.$data->image);
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/logo/', $fileName);
            $data['image'] = $fileName;
        }
        $data->save();
        
        return redirect()->route('user.logos')->with('toast_success', 'Logo Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $data = Logo::find($request->id);
        if(!is_null($data))
        {
            if(file_exists('images/logo/'.$data->image) AND !empty($data->image))
            {
                unlink('images/logo/'.$data->image);
            }
            
            $data->delete();
        }
        
        return redirect()->back()->with('toast_success', 'Logo Data Deleted Successfully');
    }
}
