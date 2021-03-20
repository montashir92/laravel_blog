<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Laravel Blog')</title>
        @include('frontend.partials.style')
        
    </head>
    <body>
        <!-- Header Section -->
        @include('frontend.partials.header')
        
        @yield('main_content')

        <!-- Footer Part -->
        
        @include('frontend.partials.footer')
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="gotoup">
                        <img src="{{ asset('public/frontend/image/scrl.jpg') }}" style="width: 40px; height: 40px;">
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.partials.script')
        @yield('scripts')
    </body>
</html>