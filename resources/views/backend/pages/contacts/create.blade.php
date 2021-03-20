@extends('backend.layouts.admin_master')
@section('admin_content')


	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
                    <i class="fas fa-edit"></i> Update Contact
                    @else
                    <i class="fas fa-plus-square"></i> Add Contact
                    @endif
                </h3>
                
                <a href="{{ route('contacts.index') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Contact List</a>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ (@$editData) ? route('contact.update', $editData->id) : route('contact.store') }}" method="post" id="myForm">
                  @csrf

                    <div class="form-group row">
                      <label for="address" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-6">
                          <input type="text" name="address" id="address" value="{{ @$editData->address }}" class="form-control">
                          <font style="color: red">{{ ($errors->has('address')) ? ($errors->first('address')) : '' }}</font>
                      </div>
                    </div>
                  
                    <div class="form-group row">
                      <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                      <div class="col-sm-6">
                          <input type="text" name="mobile" id="mobile" value="{{ @$editData->mobile }}" class="form-control">
                          <font style="color: red">{{ ($errors->has('mobile')) ? ($errors->first('mobile')) : '' }}</font>
                      </div>
                    </div>
                  
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-6">
                          <input type="text" name="email" id="email" value="{{ @$editData->email }}" class="form-control">
                          <font style="color: red">{{ ($errors->has('email')) ? ($errors->first('email')) : '' }}</font>
                      </div>
                    </div>
                  
                   <div class="form-group row">
                      <label for="facebook" class="col-sm-2 col-form-label">FaceBook</label>
                      <div class="col-sm-6">
                          <input type="text" name="facebook" id="facebook" value="{{ @$editData->facebook }}" class="form-control">
                          <font style="color: red">{{ ($errors->has('facebook')) ? ($errors->first('facebook')) : '' }}</font>
                      </div>
                    </div>
                  
                    <div class="form-group row">
                      <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                      <div class="col-sm-6">
                          <input type="text" name="twitter" id="twitter" value="{{ @$editData->twitter }}" class="form-control">
                          <font style="color: red">{{ ($errors->has('twitter')) ? ($errors->first('twitter')) : '' }}</font>
                      </div>
                    </div>
                  
                    <div class="form-group row">
                      <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
                      <div class="col-sm-6">
                          <input type="text" name="youtube" id="youtube" value="{{ @$editData->youtube }}" class="form-control">
                          <font style="color: red">{{ ($errors->has('youtube')) ? ($errors->first('youtube')) : '' }}</font>
                      </div>
                    </div>
                  
                    <div class="form-group row">
                      <label for="google_plus" class="col-sm-2 col-form-label">Google Plus</label>
                      <div class="col-sm-6">
                          <input type="text" name="google_plus" id="google_plus" value="{{ @$editData->google_plus }}" class="form-control">
                          <font style="color: red">{{ ($errors->has('google_plus')) ? ($errors->first('google_plus')) : '' }}</font>
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
      address: {
        required: true
      },
      mobile: {
        required: true
      },
      email: {
        required: true
      },
      facebook: {
        required: true
      },
      twitter: {
        required: true
      },
      youtube: {
        required: true
      },
      google_plus: {
        required: true
      }
      
    },

    messages: {
      address: {
        required: "Pleasse Provide A Address",
      },
      mobile: {
        required: "Pleasse Provide A Mobile",
      },
      email: {
        required: "Pleasse Provide A Email Address",
      },
      facebook: {
        required: "Pleasse Provide A Facebook Link",
      },
      twitter: {
        required: "Pleasse Provide A Twitter Link",
      },
      youtube: {
        required: "Pleasse Provide A Youtube Link",
      },
      google_plus: {
        required: "Pleasse Provide A Google Plus Link",
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