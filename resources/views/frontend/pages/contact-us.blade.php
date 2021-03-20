@extends('frontend.layouts.master')
@section('main_content')

@section('title')
Laravel Blog - Contact Page
@endsection


<!-- Banner Section -->
<section class="banner_part">
    <img src="{{ asset('public/frontend/image/banner.jpg') }}" style="width: 100%">
</section>

<!-- About us Section -->
<section class="about_us">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid black;width: 39%;">Send us a Message</h3>
                
                <form action="{{ route('contactu.store') }}" method="post" id="myForm">
                    @csrf
                    
                    <div class="form-row" style="background: #ddd;">
                        <div class="form-group col-md-6">
                            <label for="name">Name <span style="color: red;font-weight: bold;">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Write Your Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email <span style="color: red;font-weight: bold;">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Write Your Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_no">Mobile No <span style="color: red;font-weight: bold;">*</span></label>
                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Write Your Mobile No">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address <span style="color: red;font-weight: bold;">*</span></label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Write Your Address">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="message">Message <span style="color: red;font-weight: bold;">*</span></label>
                            <textarea name="message" class="form-control" id="message" placeholder="Write Your Message" rows="5">
                                
                            </textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid black;width: 49%;">Office Location</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.5983460988937!2d90.42140761445673!3d23.79731309290065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7ba919c9e8f%3A0x74c8c1dc2d04bd18!2sNatun%20Bazar%20Foot%20Over%20Bridge%2C%20Dhaka%201212!5e0!3m2!1sen!2sbd!4v1575619103631!5m2!1sen!2sbd" width="100%" height="410" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')
<script>
$(function () {
  
  $('#myForm').validate({
    rules: {
      name: {
        required: true
      },
      email: {
        required: true
      },
      mobile: {
        required: true
      },
      address: {
        required: true
      },
      message: {
        required: true
      }
    },

    messages: {
      name: {
        required: "Pleasse Provide A Name",
      },
      email: {
        required: "Pleasse Provide A Email Address",
      },
      mobile: {
        required: "Pleasse Provide A Mobile Number",
      },
      address: {
        required: "Pleasse Provide A Address",
      },
      message: {
        required: "Pleasse Provide A Message",
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
@endsection
