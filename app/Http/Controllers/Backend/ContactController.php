<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Communicate;

class ContactController extends Controller
{
    
    public function index()
    {
        $data['countContact'] = Contact::count();
        $data['allData'] = Contact::all();
        return view('backend.pages.contacts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.contacts.create');
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
            'address' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email|unique:contacts,email',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'youtube' => 'required|url',
            'google_plus' => 'required|url',
        ]);
        
        $contacts = new Contact();
        $contacts->address = $request->address;
        $contacts->mobile = $request->mobile;
        $contacts->email = $request->email;
        $contacts->facebook = $request->facebook;
        $contacts->twitter = $request->twitter;
        $contacts->youtube = $request->youtube;
        $contacts->google_plus = $request->google_plus;
        $contacts->created_by = Auth::user()->id;
        $contacts->save();
        return redirect()->route('contact.create')->with('toast_success', 'A New Contact Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Contact::find($id);
        return view('backend.pages.contacts.create', $data);
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
        $contacts = Contact::find($id);
        
        $this->validate($request, [
            'address' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email|unique:contacts,email,'.$contacts->id,
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'youtube' => 'required|url',
            'google_plus' => 'required|url',
        ]);
        
        $contacts->address = $request->address;
        $contacts->mobile = $request->mobile;
        $contacts->email = $request->email;
        $contacts->facebook = $request->facebook;
        $contacts->twitter = $request->twitter;
        $contacts->youtube = $request->youtube;
        $contacts->google_plus = $request->google_plus;
        $contacts->created_by = Auth::user()->id;
        $contacts->save();
        return redirect()->route('contacts.index')->with('toast_success', 'Contact Data Updated Successfully');
    }
    /*
     * Show Communicate Method
     */
    public function viewCommunicate()
    {
        $data['allData'] = Communicate::orderBy('id', 'desc')->get();
        return view('backend.pages.contacts.view_communicate', $data);
    }
    
    /*
     * Delete Communicate Method
     */
    public function deleteCommunicate(Request $request)
    {
        $communicate = Communicate::find($request->id);
        if(!is_null($communicate))
        {
            $communicate->delete();
        }
        return redirect()->back()->with('toast_success', 'Communicate Data Deleted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $contact = Contact::find($request->id);
        if(!is_null($contact))
        {
            $contact->delete();
        }
        
        return redirect()->back()->with('toast_success', 'Contact Data Deleted Succesfully');
    }
}
