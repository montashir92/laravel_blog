<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\About;

class AboutsController extends Controller
{
    
    public function index()
    {
        $data['countAbout'] = About::count();
        $data['allData'] = About::all();
        return view('backend.pages.abouts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.abouts.create');
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
            'description' => 'required',
        ]);
        
        $abouts = new About();
        $abouts->description = $request->description;
        $abouts->created_by = Auth::user()->id;
        $abouts->save();
        return redirect()->route('about.create')->with('toast_success', 'A New About Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = About::find($id);
        return view('backend.pages.abouts.create', $data);
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
            'description' => 'required',
        ]);
        
        $abouts = About::find($id);
        $abouts->description = $request->description;
        $abouts->updated_by = Auth::user()->id;
        $abouts->save();
        return redirect()->route('abouts.index')->with('toast_success', 'About Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $about = About::find($request->id);
        if(!is_null($about))
        {
            $about->delete();
        }
        return redirect()->back()->with('toast_success', 'About Data Deleted Successfully');
    }
}
