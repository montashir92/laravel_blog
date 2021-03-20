<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vision;

class VisionsController extends Controller
{
    
    public function index()
    {
        $data['countVision'] = Vision::count();
        $data['allData'] = Vision::all();
        return view('backend.pages.visions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.visions.create');
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
            'title' => 'required',
        ]);
        
        $visions = new Vision();
        $visions->title = $request->title;
        $visions->created_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/visions/', $fileName);
            $visions['image'] = $fileName;
        }
        $visions->save();
        return redirect()->route('visions.create')->with('toast_success', 'A New Vision Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Vision::find($id);
        return view('backend.pages.visions.create', $data);
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
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:3000',
            'title' => 'required',
        ]);
        
        $visions = Vision::find($id);
        $visions->title = $request->title;
        $visions->updated_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink('images/visions/'.$visions->image);
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/visions/', $fileName);
            $visions['image'] = $fileName;
        }
        $visions->save();
        return redirect()->route('visions.index')->with('toast_success', 'Vision Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $vision = Vision::find($request->id);
        if(!is_null($vision))
        {
            if(file_exists('images/visions/'.$vision->image) AND !empty($vision->image))
            {
                unlink('images/visions/'.$vision->image);
            }
            
            $vision->delete();
        }
        
        return redirect()->back()->with('toast_success', 'Vision Data Deleted Successfully');
    }
}
