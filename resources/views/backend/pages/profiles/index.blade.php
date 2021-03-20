@extends('backend.layouts.admin_master')
@section('admin_content')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-id-card"></i> My Profile</h3>
                    </div>

                    <div class="card-body">
                        
                        <div class="col-md-6 offset-md-3">
                            
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{ (!empty($user->image)) ? asset('images/users/'.$user->image) : asset('images/default/no.jpg') }}"
                                             alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                    <p class="text-muted text-center">{{ $user->address }}</p>

                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Mobile No</strong></td>
                                                <td>{{ $user->mobile }}</td>
                                              </tr>

                                              <tr>
                                                <td><strong>Email</strong></td>
                                                <td>{{ $user->email }}</td>
                                              </tr>

                                              <tr>
                                                <td><strong>Gender</strong></td>
                                                <td>{{ $user->gender }}</td>
                                              </tr>
                                        </tbody>
                                    </table>

                                    <a href="{{ route('user.profile.edit') }}" class="btn btn-primary btn-block mt-2"><b>Edit Profile</b></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection