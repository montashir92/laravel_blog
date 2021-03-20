@extends('backend.layouts.admin_master')
@section('admin_content')


	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Logo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Logo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    @if(isset($editData))
                    <i class="fas fa-edit"></i> Update Logo
                    @else
                    <i class="fas fa-plus-square"></i> Add Logo
                    @endif
                </h3>
                
                <a href="{{ route('user.logos') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Logo List</a>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ (@$editData) ? route('user.logo.update', $editData->id) : route('user.logo.store') }}" method="post" id="myForm" enctype="multipart/form-data">
                  @csrf

                  <div class="form-row">

                    <div class="form-group col-md-4">
                      <label for="image">Upload Image</label>
                      <input type="file" name="image" id="image" class="form-control">
                      <font style="color: red">{{ ($errors->has('image')) ? ($errors->first('image')) : '' }}</font>
                    </div>

                    <div class="form-group col-md-4">
                      <img src="{{ (@$editData->image) ? asset('images/logo/'.@$editData->image) : asset('images/default/no.jpg') }}" id="showImage" style="width: 170px; height: 160px; border: 1px solid #999; padding: 2px;" alt="">
                    </div>

                    
                    <div class="form-group col-md-12">
                      
                      <button type="submit" class="btn btn-success">{{(@$editData)?'Update change':'Save change'}}</button>
                      
                    </div>

                  </div>

                </form>
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
  
  $('#myForm').validate({
    rules: {
      image: {
        image: true
      }
    },

    messages: {
      image: {
        image: "Pleasse Provide A Valid Image",
      },

    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


<script>
  $(document).ready(function(){
    $("#image").change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>



@endsection