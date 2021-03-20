<section class="our_services">
    <div class="container" style="padding-top: 15px">
        <!-- Nav tab -->
        <ul class="nav nav-tabs">
            @foreach($services as $service)
            <li class="nav-item">
                <a href="#{{ $service->id }}" class="nav-link {{ ($loop->index == 0) ? 'active' : '' }}" data-toggle="tab">{{ $service->title }}</a>
            </li>
            @endforeach
        </ul>
        <!-- Tab Content -->
        <div class="tab-content">
            @foreach($services as $service)
            <div id="{{ $service->id }}" class="container tab-pane {{ ($loop->index == 0) ? 'active' : '' }}">
                <h3>{{ $service->title }}</h3>
                <p>{!! $service->description !!}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>