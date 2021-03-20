<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NewsEvent;

class NewsEventController extends Controller
{
    
    public function index()
    {
        $data['allData'] = NewsEvent::all();
        return view('backend.pages.news_events.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.news_events.create');
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
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:3000',
        ]);
        
        $news_event = new NewsEvent();
        $news_event->title = $request->title;
        $news_event->description = $request->description;
        $news_event->date = date('Y-m-d', strtotime($request->date));
        $news_event->created_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/news_events/', $fileName);
            $news_event['image'] = $fileName;
        }
        $news_event->save();
        return redirect()->route('news_event.create')->with('toast_success', 'A New News Event Added Successfully');
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
        $data['editData'] = NewsEvent::find($id);
        return view('backend.pages.news_events.create', $data);
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
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:3000',
        ]);
        
        $news_event = NewsEvent::find($id);
        $news_event->title = $request->title;
        $news_event->description = $request->description;
        $news_event->date = date('Y-m-d', strtotime($request->date));
        $news_event->updated_by = Auth::user()->id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink('images/news_events/'.$news_event->image);
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move('images/news_events/', $fileName);
            $news_event['image'] = $fileName;
        }
        $news_event->save();
        return redirect()->route('news_events.index')->with('toast_success', 'News Event Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $data = NewsEvent::find($request->id);
        if(!is_null($data))
        {
            if(file_exists('images/news_events/'.$data->image) AND !empty($data->image))
            {
                unlink('images/news_events/'.$data->image);
            }
            
            $data->delete();
        }
        
        return redirect()->back()->with('toast_success', 'News Event Deleted Successfully');
    }
}
