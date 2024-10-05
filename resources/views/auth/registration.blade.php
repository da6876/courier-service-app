@section('title',"Registation")
@extends('layout.public')
@section('style')
    <style>
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Ensure it's on top of other elements */
        }

        .spinner {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

    </style>
@endsection
@section('main')
    <div id="loader" style="display:none;">
        <div class="spinner"></div>
    </div>
<!-- page-body-wrapper start -->
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-6 mx-auto">
                    <div id="loader" style="display:none;">
                        <div class="spinner"></div>
                    </div>
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5 UserLogin" id="regForm">
                        <div class="brand-logo">
                            <img src="{{asset('assets/images/logo.png')}}" alt="logo"/>
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <form id="loginForm" class="pt-3">@csrf
                            <input type="hidden" id="ip" name="ip">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="company_name" id="company_name" placeholder="Company Name">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="owner_name" id="owner_name" placeholder="Owner’s Name">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-lg" name="owner_phone" id="owner_phone" placeholder="Mobile Number">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" name="owner_email" id="owner_email" placeholder="Email Address ">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" checked>
                                        I agree to all Terms & Conditions
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3 d-grid gap-2">
                                <button type="button" onclick="loginNow()" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                            </div>
                            <div class="text-center mt-4 fw-light">
                                Already have an account? <a href="{{url('login')}}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5 UserLogin" id="regSuccess" style="display: none">
                        <div class="brand-logo text-center">
                            <img src="{{asset('assets/images/logo.png')}}" alt="logo"/>
                        </div>
                        <h6>Hello! Dhali Abir</h6>
                        <h3 class="font-weight-light">Thanks for Sign Up.</h3>
                        <span><p><b>Great news!</b> Your merchant account has been successfully created, and you'll receive a confirmation email.</p></span>
                        <div class="text-center mt-4 fw-light">
                            Already have an account? <a href="{{url('login')}}" class="text-primary">Login</a>
                        </div>
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
    document.getElementById("regSuccess").style.display = "none";

    fetch('https://api.ipify.org?format=json')
    .then(response => response.json())
    .then(data => {
        document.getElementById('ip').value = data.ip;
    });

    function loginNow() {
        document.getElementById("loader").style.display = "flex";
        url = "{{ url('regPost') }}";
        var formData = new FormData($(".UserLogin form")[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                document.getElementById("loader").style.display = "none";
                console.log(data);
                if (data.statusCode == 200) {
                    document.getElementById("regForm").style.display = "none";
                    document.getElementById("regSuccess").style.display = "block";
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
                document.getElementById("loader").style.display = "none";
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
