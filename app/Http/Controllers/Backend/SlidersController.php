<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;

class SlidersController extends Controller
{
    
    public function index()
    {
        $data['allData'] = Slider::all();
        return view('backend.pages.sliders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.sliders.create');
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
            'short_title' => 'required',
            'long_title' => 'required',
        ]);
        
        $sliders = new Slider();
        $sliders->short_title = $request->short_title;
        $sliders->long_title = $request->long_title;
        $sliders->created_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/sliders/', $fileName);
            $sliders['image'] = $fileName;
        }
        $sliders->save();
        return redirect()->route('user.slider.create')->with('toast_success', 'A New Sliders Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Slider::find($id);
        return view('backend.pages.sliders.create', $data);
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
            'short_title' => 'required',
            'long_title' => 'required',
        ]);
        
        $sliders = Slider::find($id);
        $sliders->short_title = $request->short_title;
        $sliders->long_title = $request->long_title;
        $sliders->created_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink('images/sliers/'.$sliders->image);
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/sliders/', $fileName);
            $sliders['image'] = $fileName;
        }
        $sliders->save();
        return redirect()->route('user.sliders')->with('toast_success', 'Sliders Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $slider = Slider::find($request->id);
        if(!is_null($slider))
        {
            if(file_exists('images/sliders/'.$slider->image) AND !empty($slider->image))
            {
                unlink('images/sliders/'.$slider->image);
            }
            
            $slider->delete();
        }
        
        return redirect()->back()->with('toast_success', 'Slider Data Deleted Successfully');
    }
}
