@extends('frontend.layouts.master')
@section('main_content')

@section('title')
Laravel Blog - Vision Page
@endsection

<!-- Banner Section -->
<section class="banner_part">
    <img src="{{ asset('public/frontend/image/banner.jpg') }}" style="width: 100%">
</section>

<section class="mission_vision">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid #000000; width: 25%;">Vision</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('images/visions/'.$vision->image) }}" style="border: 1px solid #ddd;padding: 5px;background: #EFEE03;border-radius: 10px;float: left;margin: 10px;width: 400px;height: 200px;">
                <p style="text-align: justify;margin-top: 5px;line-height: 30px;"> {!! $vision->title !!}</p>
            </div>
        </div>
    </div>
</section>




@endsection

