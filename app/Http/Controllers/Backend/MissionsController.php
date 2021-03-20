<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mission;

class MissionsController extends Controller
{
    
    public function index()
    {
        $data['countMission'] = Mission::count();
        $data['allData'] = Mission::all();
        return view('backend.pages.missions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.missions.create');
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
        
        $missions = new Mission();
        $missions->title = $request->title;
        $missions->created_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/missions/', $fileName);
            $missions['image'] = $fileName;
        }
        $missions->save();
        return redirect()->route('missions.create')->with('toast_success', 'A New Mission Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Mission::find($id);
        return view('backend.pages.missions.create', $data);
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
        
        $missions = Mission::find($id);
        $missions->title = $request->title;
        $missions->updated_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink('images/missions/'.$missions->image);
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/missions/', $fileName);
            $missions['image'] = $fileName;
        }
        $missions->save();
        return redirect()->route('missions.index')->with('toast_success', 'Mission Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $mission = Mission::find($request->id);
        if(!is_null($mission))
        {
            if(file_exists('images/missions/'.$mission->image) AND !empty($mission->image))
            {
                unlink('images/missions/'.$mission->image);
            }
            
            $mission->delete();
        }
        
        return redirect()->back()->with('toast_success', 'Mission Data Deleted Successfully');
    }
}
