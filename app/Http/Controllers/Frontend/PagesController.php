<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Mission;
use App\Models\Vision;
use App\Models\NewsEvent;
use App\Models\Service;
use App\Models\About;
use App\Models\Communicate;
use Mail;

class PagesController extends Controller
{
    
    public function index()
    {
        $data['logo'] = Logo::first();
        $data['sliders'] = Slider::all();
        $data['contact'] = Contact::first();
        $data['mission'] = Mission::first();
        $data['vision'] = Vision::first();
        $data['news_events'] = NewsEvent::orderBy('id', 'desc')->get();
        $data['services'] = Service::all();
        return view('frontend.pages.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
        $data['about'] = About::first();
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.pages.about_us', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactUs()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.pages.contact-us', $data);
    }
    
    public function contactStore(Request $request)
    {
        $contacts = new Communicate();
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->mobile = $request->mobile;
        $contacts->address = $request->address;
        $contacts->message = $request->message;
        $contacts->save();
        
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'message' => $request->message,
        );
        
        Mail::send('frontend.pages.mails.contact',$data, function($message) use($data){
            $message->from('montashirb@gmail.com', 'Blog project');
            $message->to($data['email']);
            $message->subject('Thank for Contact us');
        });
        
        return redirect()->back()->with('success', 'Your Message Successfully Send');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newsDetail($id)
    {
        $data['news'] = NewsEvent::find($id);
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.pages.news_event_details', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mission()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['mission'] = Mission::first();
        return view('frontend.pages.mission', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vision()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['vision'] = Vision::first();
        return view('frontend.pages.vision', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newsEvent()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['news_events'] = NewsEvent::orderBy('id', 'desc')->get();
        return view('frontend.pages.news_event', $data);
    }
}
