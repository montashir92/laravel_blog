@extends('frontend.layouts.master')
@section('main_content')

<!-- Slider Section -->
@include('frontend.partials.slider')
<!-- Mission and Vision -->
@include('frontend.partials.missionvision')
<!-- News and Events -->
<section class="nesw_events" style="background: #ddd">
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="padding-top: 15px;">
                <h3 style="border-bottom: 1px solid #000;width: 85%">News and Events</h3>
            </div>
            <div class="col-md-9" style="padding-top: 15px;">
                <table class="table table-striped table-bordered table-hover table-md table-warning">
                    <thead class="thead-dark">
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news_events as $news_event)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ date('d M Y',strtotime($news_event->date)) }}</td>
                            <td><img src="{{ asset('images/news_events/'.$news_event->image) }}"></td>
                            <td>{{ $news_event->title }}</td>
                            <td><a href="{{ route('news.event.details', $news_event->id) }}" class="btn btn-info">Details</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Services -->
@include('frontend.partials.ourservoce')
@endsection

