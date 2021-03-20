<section class="mission_vision">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid #000000; width: 70%;">Mission and Vision</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/missions/'.$mission->image) }}" style="border: 1px solid #ddd;padding: 5px;background: #EFEE03;border-radius: 30px;float: left;margin-right: 10px;">
                <p style="text-align: justify;"><strong>Mission</strong> {!! $mission->title !!}</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/visions/'.$vision->image) }}" style="border: 1px solid #ddd;padding: 5px;background: #EFEE03;border-radius: 30px;float: left;margin-right: 10px;">
                <p style="text-align: justify;"><strong>Vision</strong> {!! $vision->title !!}</p>
            </div>
        </div>
    </div>
</section>