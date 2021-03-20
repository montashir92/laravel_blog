@extends('backend.layouts.admin_master')
@section('admin_content')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Logo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Logo</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> View Logo List</h3>
                        @if($countLogo < 1)
                        <a href="{{ route('user.logo.create') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-square"></i> Add Logo</a>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $value)
                                <tr class="{{ $value->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src="{{ asset('images/logo/'.$value->image) }}" width="50" height="50" alt=""></td>
                                    <td> <span class="badge badge-success">Published</span></td>
                                    <td>
                                        <a href="{{ route('user.logo.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('user.logo.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$value->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


@endsection

@section('admin_script')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection