@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('public/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">LaravelBlog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ (!empty(Auth::user()->image)) ? asset('images/users/'.Auth::user()->image) : asset('images/default/no.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('home') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>

                @if(Auth::user()->usertype == 'admin')
                <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Manage User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link {{($route=='user.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View User</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif
                
                <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Manage Profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.profiles') }}" class="nav-link {{($route=='user.profiles')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('user.change.password') }}" class="nav-link {{($route=='user.change.password')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{($prefix=='/logos')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Logo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.logos') }}" class="nav-link {{($route=='user.logos')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Logo</p>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/sliders')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Manage Slider
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.sliders') }}" class="nav-link {{($route=='user.sliders')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Slider</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview {{($prefix=='/missions')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Manage Mission
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('missions.index') }}" class="nav-link {{($route=='missions.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Mission</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview {{($prefix=='/visions')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Manage Vision
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('visions.index') }}" class="nav-link {{($route=='visions.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Vision</p>
                            </a>
                        </li>


                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/news_events')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Manage News_events
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('news_events.index') }}" class="nav-link {{($route=='news_events.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View News_events</p>
                            </a>
                        </li>


                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/services')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-minus-square"></i>
                        <p>
                            Manage Service
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('services.index') }}" class="nav-link {{($route=='services.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Service</p>
                            </a>
                        </li>


                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/contacts')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Manage Contact
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contacts.index') }}" class="nav-link {{($route=='contacts.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Contact</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('contact.communicate') }}" class="nav-link {{($route=='contact.communicate')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Communicate</p>
                            </a>
                        </li>


                    </ul>
                </li>
                
                
                <li class="nav-item has-treeview {{($prefix=='/abouts')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Manage About
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('abouts.index') }}" class="nav-link {{($route=='abouts.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View About</p>
                            </a>
                        </li>


                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>