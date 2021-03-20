@extends('frontend.layouts.master')
@section('main_content')

@section('title')
Laravel Blog - News Event Details
@endsection

<!-- Banner Section -->
<section class="banner_part">
    <img src="{{ asset('public/frontend/image/banner.jpg') }}" style="width: 100%">
</section>

<!-- About us Section -->
<section class="about_us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="padding: 10px; margin: 10px;">News And Event</h3>
                <hr>
                <img src="{{ asset('images/news_events/'.$news->image) }}" style="border: 1px solid #ddd;padding: 5px;background: #EFEE03;border-radius: 10px;float: left;margin: 10px; width: 400px;">
                <p style="text-align: justify;"><strong>{{ $news->title }}</strong><br> <span class="badge badge-success">{{ date('d M Y',strtotime($news->date)) }}</span> {!! $news->description !!}</p>
            </div>'
        </div>
    </div>
</section>




@endsection

