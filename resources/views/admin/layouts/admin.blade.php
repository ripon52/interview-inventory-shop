<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="arman" content="A Creative, Dynamic Full-Stack Web Developer. https://facebook.com/ripon59">
    <meta name="ripon" content="A Creative, Dynamic Full-Stack Web Developer. https://facebook.com/ripon59">
    <meta name="Ripon Uddin" content="A Creative, Dynamic Full-Stack Web Developer. https://facebook.com/ripon59">
    <title>@yield("title") | {{ userType() }} Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend') }}/images/favicon.png">
    <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet"
    />
    <style>
        .form-control {
            border-radius: 1.25rem;
            background: #fff;
            border: 1px solid #f0f1f5;
            color: rgba(0,0,0,0.7);
            height: 56px;
            /*font-weight: bold;*/
        }

        .modal-lg, .modal-xl{
            width: 1000px!important;
        }
    </style>
    @yield("css")
    @yield("style")

    <script>
        window.moneyFormat=function (amount) {
            return  new Intl.NumberFormat(
                'bd-BD',
                { style: 'currency', currency: 'BDT' })
                .format(amount);
        }
    </script>
</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    @include("admin.includes.admin.admin-nav-header")
    <!--**********************************
        Nav header end
    ***********************************-->
    <!--**********************************
        Header start
    ***********************************-->
    @include("admin.includes.admin.header")
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
@include("admin.includes.admin.admin-menu")

<!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @yield("content")
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Developed by <a href="http://ruarman.com/" target="_blank">Discuss-BD</a> {{ Date('Y') }}</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

</div>
<!--**********************************
    Main wrapper end
***********************************-->

@if(session()->has("success"))
    <script>
        $(()=>{
           alert("{{ session()->get("success") }}");
        });
    </script>
@endif

@if(session()->has("warning"))
    <script>
        $(()=>{
            alert("Warning........");
        });
    </script>
@endif

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('backend') }}/vendor/global/global.min.js"></script>
<script src="{{ asset('backend') }}/js/custom.min.js"></script>
<script src="{{ asset('backend') }}/js/deznav-init.js"></script>
<script src="{{ asset('backend') }}/js/notify.min.js" type="text/javascript"></script>

@yield("scripts")
@yield("script")
@yield("js")
<!-- Dashboard 1 -->
</body>
</html>
