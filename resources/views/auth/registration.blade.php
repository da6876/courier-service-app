@section('title',"Registation")
@extends('layout.public')
@section('main')

<!-- page-body-wrapper start -->
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5 UserLogin">
                        <div class="brand-logo">
                            <img src="{{asset('assets/images/logo.png')}}" alt="logo"/>
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <form class="pt-3">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Company Name">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Owner’s Name">
                            </div>
                            <div class="form-group">
                              <input type="number" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Mobile Number">
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email Address ">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="mb-4">
                              <div class="form-check">
                                <label class="form-check-label text-muted">
                                  <input type="checkbox" class="form-check-input">
                                  I agree to all Terms & Conditions
                                </label>
                              </div>
                            </div>
                            <div class="mt-3 d-grid gap-2">
                              <a class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" href="../../index.html">SIGN UP</a>
                            </div>
                            <div class="text-center mt-4 fw-light">
                              Already have an account? <a href="{{url('login')}}" class="text-primary">Login</a>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page-body-wrapper ends -->

@endsection
@section('script')
<script>
    fetch('https://api.ipify.org?format=json')
    .then(response => response.json())
    .then(data => {
        document.getElementById('ip').value = data.ip;
    });
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById('latitudeInput').value = latitude;
            document.getElementById('longitudeInput').value = longitude;
        }, function(error) {
            console.error('Error obtaining location: ', error);
        });
    } else {
        console.error('Geolocation is not supported by this browser.');
    }
    function loginNow() {
        url = "{{ url('loginPost') }}";
        var formData = new FormData($(".UserLogin form")[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                if (data.statusCode == 200) {
                    window.location.href = data.route;
                    $('.UserLogin form')[0].reset();
                }else if (data.statusCode == 204) {
                    showErrors(data.errors);
                }else{
                    Swal.fire({
                        icon: "error",
                        text: data.statusMsg,
                    });
                }
            }, error: function (data) {
                Swal.fire({
                    text: "Internal Server Error",
                    icon: "question"
                });
            }
        });
        return false;
    };



</script>
@endsection
