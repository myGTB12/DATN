@extends('layouts/blankLayout')

@section('title', __('messages.title'))


<head>
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/fonts/boxicons.css?id=87122b3a3900320673311cebdeb618da">
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/fonts/fontawesome.css?id=89157e39c524ff7f679d3aebf872b7b9">
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/fonts/flag-icons.css?id=403b97c176f3cdf56a3cbf09107ee240">

    <!-- Vendor Styles -->
    <!-- Vendor -->
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/bs-stepper/bs-stepper.css">
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/select2/select2.css">
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css">


    <!-- Page Styles -->
    <!-- Page -->
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/pages/page-auth.css">

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/helpers.js"></script>
</head>
@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')

<body>
    <!-- Layout Content -->

    <!-- Content -->
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">

            <!-- Left Text -->
            <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-end p-5 pe-0">
                <div class="w-px-400">
                    <img src="https://i.pinimg.com/564x/f1/d7/ab/f1d7ab7ea78800a08390dc361b8fa9fe.jpg" class="img-fluid" alt="multi-steps" width="900" data-app-dark-img="illustrations/create-account-dark.png" data-app-light-img="illustrations/create-account-light.png">
                </div>
            </div>
            <!-- /Left Text -->

            <!--  Multi Steps Registration -->
            <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-sm-5 p-3">
                <div class="w-px-700">
                    <div id="multiStepsValidation" class="bs-stepper shadow-none linear">
                        <div class="bs-stepper-header border-bottom-0">
                            <div class="step active" data-target="#accountDetailsValidation">
                                <button type="button" class="step-trigger" aria-selected="true">
                                    <span class="bs-stepper-circle"><i class="bx bx-home-alt"></i></span>
                                    <span class="bs-stepper-label mt-1">
                                        <span class="bs-stepper-title">Account</span>
                                        <span class="bs-stepper-subtitle">Account Details</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="bx bx-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#personalInfoValidation">
                                <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                    <span class="bs-stepper-circle"><i class="bx bx-user"></i></span>
                                    <span class="bs-stepper-label mt-1">
                                        <span class="bs-stepper-title">Personal</span>
                                        <span class="bs-stepper-subtitle">Enter Information</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form id="multiStepsForm" action="{{route('station.register')}}" method="post">
                                @csrf
                                <div id="accountDetailsValidation" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Account Information</h3>
                                        <span>Enter Your Account Details</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6 fv-plugins-icon-container">
                                            <label class="form-label">First name</label>
                                            <input type="text" name="first_name" class="form-control">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 fv-plugins-icon-container">
                                            <label class="form-label">Last name</label>
                                            <input type="text" name="last_name" class="form-control">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsUsername">Username</label>
                                            <input type="text" name="name" id="multiStepsUsername" class="form-control">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsEmail">Email</label>
                                            <input type="email" name="email" id="multiStepsEmail" class="form-control" aria-label="john.doe">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 form-password-toggle fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsPass">Password</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <input type="password" id="multiStepsPass" name="password" class="form-control" placeholder="············" aria-describedby="multiStepsPass2">
                                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="bx bx-hide"></i></span>
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 form-password-toggle fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsConfirmPass">Confirm Password</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <input type="password" id="multiStepsConfirmPass" name="confirm_password" class="form-control" placeholder="············" aria-describedby="multiStepsConfirmPass2">
                                                <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"><i class="bx bx-hide"></i></span>
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-label-secondary btn-prev" type="button" disabled=""> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="button"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal Info -->
                                <div id="personalInfoValidation" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Your representative Information</h3>
                                        <span>Enter Your Representative Information</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsFirstName">Company Name</label>
                                            <input type="text" id="multiStepsFirstName" name="company_name" class="form-control">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsMobile">Mobile</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">VN (+84)</span>
                                                <input type="text" id="multiStepsMobile" name="phone" class="form-control multi-steps-mobile">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev" type="button"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-success btn-next btn-submit" type="submit"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Submit</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Billing Links -->
                                <div id="billingLinksValidation" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Multi Steps Registration -->
        </div>
    </div>

    <!--/ Content -->

    <!-- Include Scripts -->
    <!-- BEGIN: Vendor JS-->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/jquery/jquery.js?id=28f58d9b27389bc2161474b63d4550fb"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/popper/popper.js?id=b97e30d0826b14784a53312b6ea562bc"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/bootstrap.js?id=5cf23b844ba766fd18bf77de6f71daee"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=44b8e955848dc0c56597c09f6aebf89a"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/hammer/hammer.js?id=f2b232153f92e544aab0ed45c56ab524"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/typeahead-js/typeahead.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/select2/select2.js"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/js/main.js?id=c7461a0f5b05fcaf0ec16762760d3ea5"></script>

    <!-- END: Theme JS-->
    <!-- Pricing Modal JS-->
    <!-- END: Pricing Modal JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('assets/js/pages-auth-multisteps.js')}}"></script>
    <!-- END: Page JS-->
</body>
@endsection