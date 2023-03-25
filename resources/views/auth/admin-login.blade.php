<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login | {{ config('app.name') }} | Inventory Shop</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend') }}/images/favicon.png">
    <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="#"><img loading="lazy" src="{{ asset('backend') }}/images/logo-full.png" alt=""></a>
                                </div>
                                <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                {{ Form::open(['route'=>'login','method'=>'post']) }}
                                <div class="form-group">
                                    <label class="mb-1 text-white"><strong>Email</strong></label>
                                    {{ Form::email('email',null,['class'=>'form-control','placeholder'=>'example@email.com']) }}
                                    @error("email")
                                    <strong class="text-white bg-danger mt-2 p-2">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="mb-1 text-white"><strong>Password</strong></label>
                                    {{ Form::password('password',['class'=>'form-control']) }}

                                    @error("password")
                                    <strong class="text-white bg-danger mt-2 p-2">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox ml-1 text-white">
                                            <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                            <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a class="text-white" href="#">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-white text-primary btn-block">Login</button>
                                </div>
                                {{ Form::close() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('backend') }}/vendor/global/global.min.js"></script>

</body>

</html>
