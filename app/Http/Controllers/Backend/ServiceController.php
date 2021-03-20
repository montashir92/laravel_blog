<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

class ServiceController extends Controller
{
    
    public function index()
    {
        $data['allData'] = Service::all();
        return view('backend.pages.services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.services.create');
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
        ]);
        
        $services = new Service();
        $services->title = $request->title;
        $services->description = $request->description;
        $services->created_by = Auth::user()->id;
        $services->save();
        return redirect()->route('service.create')->with('toast_success', 'A New Service Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Service::find($id);
        return view('backend.pages.services.create', $data);
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
        ]);
        
        $services = Service::find($id);
        $services->title = $request->title;
        $services->description = $request->description;
        $services->updated_by = Auth::user()->id;
        $services->save();
        return redirect()->route('services.index')->with('toast_success', 'Service Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $service = Service::find($request->id);
        if(!is_null($service))
        {
            $service->delete();
        }
        return redirect()->back()->with('toast_success', 'Service Data Deleted Successfully');
    }
}
