<section class="slider_part">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($sliders as $slider)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($sliders as $slider)
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset('images/sliders/'.$slider->image) }}')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">{{ $slider->short_title }}</h2>
                    <p class="lead">{{ $slider->long_title }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>