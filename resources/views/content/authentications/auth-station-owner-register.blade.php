@extends('layouts/blankLayout')

@section('title', 'Forgot Password Basic - Pages')


<head>
    <title>Multi Steps Sign-up - Pages |
        Sneat -
        Bootstrap 5 HTML Admin Template - Pro</title>
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
    <style type="text/css">
        .layout-menu-fixed .layout-navbar-full .layout-menu,
        .layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
            top: 0px !important;
        }

        .layout-page {
            padding-top: 0px !important;
        }

        .content-wrapper {
            padding-bottom: 0px !important;
        }
    </style>
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
                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/create-account-light.png" class="img-fluid" alt="multi-steps" width="600" data-app-dark-img="illustrations/create-account-dark.png" data-app-light-img="illustrations/create-account-light.png">
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
                            <div class="line">
                                <i class="bx bx-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#billingLinksValidation">
                                <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                    <span class="bs-stepper-circle"><i class="bx bx-detail"></i></span>
                                    <span class="bs-stepper-label mt-1">
                                        <span class="bs-stepper-title">Billing</span>
                                        <span class="bs-stepper-subtitle">Payment Details</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form id="multiStepsForm" onsubmit="return false">
                                <!-- Account Details -->
                                <div id="accountDetailsValidation" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Account Information</h3>
                                        <span>Enter Your Account Details</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsUsername">Username</label>
                                            <input type="text" name="multiStepsUsername" id="multiStepsUsername" class="form-control" placeholder="johndoe">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsEmail">Email</label>
                                            <input type="email" name="multiStepsEmail" id="multiStepsEmail" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 form-password-toggle fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsPass">Password</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <input type="password" id="multiStepsPass" name="multiStepsPass" class="form-control" placeholder="············" aria-describedby="multiStepsPass2">
                                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="bx bx-hide"></i></span>
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 form-password-toggle fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsConfirmPass">Confirm Password</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <input type="password" id="multiStepsConfirmPass" name="multiStepsConfirmPass" class="form-control" placeholder="············" aria-describedby="multiStepsConfirmPass2">
                                                <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"><i class="bx bx-hide"></i></span>
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="multiStepsURL">Profile Link</label>
                                            <input type="text" name="multiStepsURL" id="multiStepsURL" class="form-control" placeholder="johndoe/profile" aria-label="johndoe">
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-label-secondary btn-prev" disabled=""> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal Info -->
                                <div id="personalInfoValidation" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Personal Information</h3>
                                        <span>Enter Your Personal Information</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsFirstName">First Name</label>
                                            <input type="text" id="multiStepsFirstName" name="multiStepsFirstName" class="form-control" placeholder="John">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsLastName">Last Name</label>
                                            <input type="text" id="multiStepsLastName" name="multiStepsLastName" class="form-control" placeholder="Doe">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsMobile">Mobile</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">US (+1)</span>
                                                <input type="text" id="multiStepsMobile" name="multiStepsMobile" class="form-control multi-steps-mobile" placeholder="202 555 0111">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsPincode">Pincode</label>
                                            <input type="text" id="multiStepsPincode" name="multiStepsPincode" class="form-control multi-steps-pincode" placeholder="Postal Code" maxlength="6">
                                        </div>
                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsAddress">Address</label>
                                            <input type="text" id="multiStepsAddress" name="multiStepsAddress" class="form-control" placeholder="Address">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="multiStepsArea">Landmark</label>
                                            <input type="text" id="multiStepsArea" name="multiStepsArea" class="form-control" placeholder="Area/Landmark">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsCity">City</label>
                                            <input type="text" id="multiStepsCity" class="form-control" placeholder="Jackson">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsState">State</label>
                                            <div class="position-relative"><select id="multiStepsState" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multiStepsState" tabindex="-1" aria-hidden="true">
                                                    <option value="" data-select2-id="2">Select</option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">District Of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-multiStepsState-container"><span class="select2-selection__rendered" id="select2-multiStepsState-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select an country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Billing Links -->
                                <div id="billingLinksValidation" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Select Plan</h3>
                                        <span>Select plan as per your requirement</span>
                                    </div>
                                    <!-- Custom plan options -->
                                    <div class="row gap-md-0 gap-3 mb-4">
                                        <div class="col-md">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content" for="basicOption">
                                                    <span class="custom-option-body">
                                                        <span class="mb-2 h4 d-block">Basic</span>
                                                        <span class="mb-2 d-block">A simple start for start ups &amp; Students</span>
                                                        <span class="d-flex justify-content-center">
                                                            <sup class="text-primary fs-big lh-1 mt-3">$</sup>
                                                            <span class="display-5 text-primary">0</span>
                                                            <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/month</sub>
                                                        </span>
                                                    </span>
                                                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="basicOption">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check custom-option custom-option-icon checked">
                                                <label class="form-check-label custom-option-content" for="standardOption">
                                                    <span class="custom-option-body">
                                                        <span class="mb-2 h4 d-block">Standard</span>
                                                        <span class="mb-2 d-block">For small to medium businesses</span>
                                                        <span class="d-flex justify-content-center">
                                                            <sup class="text-primary fs-big lh-1 mt-3">$</sup>
                                                            <span class="display-5 text-primary">99</span>
                                                            <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/month</sub>
                                                        </span>
                                                    </span>
                                                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="standardOption" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content" for="enterpriseOption">
                                                    <span class="custom-option-body">
                                                        <span class="mb-2 h4 d-block">Enterprise</span>
                                                        <span class="mb-2 d-block">Solution for enterprise &amp; organizations</span>
                                                        <span class="d-flex justify-content-center">
                                                            <sup class="text-primary fs-big lh-1 mt-3">$</sup>
                                                            <span class="display-5 text-primary">499</span>
                                                            <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/year</sub>
                                                        </span>
                                                    </span>
                                                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="enterpriseOption">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Custom plan options -->
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Payment Information</h3>
                                        <span>Enter your card information</span>
                                    </div>
                                    <!-- Credit Card Details -->
                                    <div class="row g-3">
                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label w-100" for="multiStepsCard">Card Number</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <input id="multiStepsCard" class="form-control multi-steps-card" name="multiStepsCard" type="text" placeholder="1356 3215 6548 7898" aria-describedby="multiStepsCardImg">
                                                <span class="input-group-text cursor-pointer" id="multiStepsCardImg"><span class="card-type"></span></span>
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label" for="multiStepsName">Name On Card</label>
                                            <input type="text" id="multiStepsName" class="form-control" name="multiStepsName" placeholder="John Doe">
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <label class="form-label" for="multiStepsExDate">Expiry Date</label>
                                            <input type="text" id="multiStepsExDate" class="form-control multi-steps-exp-date" name="multiStepsExDate" placeholder="MM/YY">
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="form-label" for="multiStepsCvv">CVV Code</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="multiStepsCvv" class="form-control multi-steps-cvv" name="multiStepsCvv" maxlength="3" placeholder="654">
                                                <span class="input-group-text cursor-pointer" id="multiStepsCvvHelp"><i class="bx bx-help-circle text-muted" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Card Verification Value" data-bs-original-title="Card Verification Value"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button type="submit" class="btn btn-success btn-next btn-submit">Submit</button>
                                        </div>
                                    </div>
                                    <!--/ Credit Card Details -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Multi Steps Registration -->
        </div>
    </div>

    <script>
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();
    </script>
    <!--/ Content -->

    <!-- Include Scripts -->
    <!-- BEGIN: Vendor JS-->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/jquery/jquery.js?id=28f58d9b27389bc2161474b63d4550fb"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/popper/popper.js?id=b97e30d0826b14784a53312b6ea562bc"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/bootstrap.js?id=5cf23b844ba766fd18bf77de6f71daee"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=44b8e955848dc0c56597c09f6aebf89a"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/hammer/hammer.js?id=f2b232153f92e544aab0ed45c56ab524"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/typeahead-js/typeahead.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/menu.js?id=c6ce30ded4234d0c4ca0fb5f2a2990d8"></script>
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
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/js/pages-auth-multisteps.js"></script>
    <!-- END: Page JS-->
</body>
@endsection