@extends('backend.layouts.admin_master')
@section('admin_content')


	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Mission</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mission</li>
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
                    <i class="fas fa-edit"></i> Update Mission
                    @else
                    <i class="fas fa-plus-square"></i> Add Mission
                    @endif
                </h3>
                
                <a href="{{ route('missions.index') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Mission List</a>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ (@$editData) ? route('missions.update', $editData->id) : route('missions.store') }}" method="post" id="myForm" enctype="multipart/form-data">
                  @csrf

                    <div class="form-group row">
                      <label for="title" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-8">
                          <textarea name="title" rows="2" class="textarea" id="title">
                          {{ @$editData->title }}
                          </textarea>
                          <font style="color: red">{{ ($errors->has('title')) ? ($errors->first('title')) : '' }}</font>
                      </div>
                    </div>
                  
                  
                    <div class="form-group row">
                      <label for="image" class="col-sm-2 col-form-label"> Upload Image</label>
                      <div class="col-sm-5">
                      <input type="file" name="image" id="image" class="form-control">
                      <font style="color: red">{{ ($errors->has('image')) ? ($errors->first('image')) : '' }}</font>
                      </div>
                      
                      <div class="col-md-2">
                        <img src="{{ (@$editData->image) ? asset('images/missions/'.@$editData->image) : asset('images/default/no.jpg') }}" id="showImage" style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;" alt="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> {{(@$editData)?'Update change':'Save change'}}</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> Clear</button>
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
      },
      short_title: {
        required: true
      },
      long_title: {
        required: true
      }
    },

    messages: {
      image: {
        image: "Pleasse Provide A Valid Image",
      },
      short_title: {
        required: "Pleasse Provide A Short Title",
      },
      long_title: {
        required: "Pleasse Provide A Long Title",
      }

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