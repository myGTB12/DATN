@extends('layouts/homeNavbarLayout')

@section('title', __('messages.title'))

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Cars</h4>

<div class="row">
  <div class="card overflow-hidden">
    <!-- Help Center Header -->
    <div class="d-flex flex-column justify-content-center align-items-center" style="background-image: url('assets/img/pages/landing.png'); background-repeat: no-repeat; background-size: cover; min-height: 500px!important; border-radius: 16px">
      <h3 class="text-center" style="color: #fff;"> {{__('messages.merge_titles')}} {{__('messages.slogan')}}</h3>
      <div class="input-wrapper my-3 input-group input-group-merge">
      </div>
      <p class="text-center px-3 mb-0" style="color: #fff;">Join us and find the car you want</p>
    </div>
    <!-- /Help Center Header -->

    <!-- Popular Articles -->
    <div class="help-center-popular-articles py-5">
      <div class="container-xl">
        <h4 class="text-center mt-2 mb-4">Sales Off & Voucher</h4>
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="row mb-3">
              <div class="col-md-4 mb-md-0 mb-4">
                <div class="card border shadow-none">
                  <div class="card-body text-center">
                    <img class="mb-3" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/rocket.png" height="60" alt="Help center articles">
                    <h5>Getting Started</h5>
                    <p> Whether you're new or you're a power user, this article will… </p>
                    <a class="btn btn-label-primary" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-article">Read More</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 mb-md-0 mb-4">
                <div class="card border shadow-none">
                  <div class="card-body text-center">
                    <img class="mb-3" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/cube-secondary.png" height="60" alt="Help center articles">
                    <h5>First Steps</h5>
                    <p> Are you a new customer wondering how to get started? </p>
                    <a class="btn btn-label-primary" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-article">Read More</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card border shadow-none">
                  <div class="card-body text-center">
                    <img class="mb-3" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/desktop.png" height="60" alt="Help center articles">
                    <h5>Add External Content</h5>
                    <p> This article will show you how to expand the functionality of... </p>
                    <a class="btn btn-label-primary" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-article">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Popular Articles -->
  </div>
  <!-- Bootstrap carousel -->
  <div class="col-md">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('assets/img/elements/13.jpg')}}" alt="First slide" />
          <div class="carousel-caption d-none d-md-block">
            <h3>First slide</h3>
            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/2.jpg')}}" alt="Second slide" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Second slide</h3>
            <p>In numquam omittam sea.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/18.jpg')}}" alt="Third slide" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Third slide</h3>
            <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </div>
  <!-- Bootstrap crossfade carousel -->
  <div class="col-md">
    <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('assets/img/elements/18.jpg')}}" alt="First slide" />
          <div class="carousel-caption d-none d-md-block">
            <h3>First slide</h3>
            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/13.jpg')}}" alt="Second slide" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Second slide</h3>
            <p>In numquam omittam sea.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/2.jpg')}}" alt="Third slide" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Third slide</h3>
            <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </div>
  <!-- Knowledge Base -->
  <div class="card overflow-hidden">
    <div class="help-center-knowledge-base py-5">
      <div class="container-xl">
        <h4 class="text-center mb-4">Knowledge Base</h4>
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="row">
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-success p-2 rounded me-2"><i class="bx bx-cart bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">eCommerce</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Pricing Wizard</a></li>
                      <li class="text-primary pb-1"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Square Sync</a></li>
                    </ul>
                    <p class="mb-0 fw-semibold">
                      <a href="javascript:void(0);">56 articles</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-info p-2 rounded me-2"><i class="bx bx-laptop bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Building Your Website</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">First Steps</a></li>
                      <li class="text-primary pb-1"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Add Images</a></li>
                    </ul>
                    <p class="mb-0 fw-semibold">
                      <a href="javascript:void(0);">111 articles</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-primary p-2 rounded me-2"><i class="bx bx-user bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Your Account</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Insights</a></li>
                      <li class="text-primary pb-1">
                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Manage Your Orders</a>
                      </li>
                    </ul>
                    <p class="mb-0 fw-semibold">
                      <a href="javascript:void(0);">29 articles</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-danger p-2 rounded me-2"><i class="bx bx-world bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Domains and Email</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1">
                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Access to Admin Account</a>
                      </li>
                      <li class="text-primary pb-1">
                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Send Email From an Alias</a>
                      </li>
                    </ul>
                    <p class="mb-0 fw-semibold">
                      <a href="javascript:void(0);">22 articles</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-warning p-2 rounded me-2"><i class="bx bx-mobile-alt bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Mobile Apps</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1">
                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Getting Started with the App</a>
                      </li>
                      <li class="text-primary pb-1">
                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Getting Started with Android</a>
                      </li>
                    </ul>
                    <p class="mb-0 fw-semibold">
                      <a href="javascript:void(0);">24 articles</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-secondary p-2 rounded me-2"><i class="bx bx-envelope bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Email Marketing</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">Getting Started</a></li>
                      <li class="text-primary pb-1">
                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/help-center-categories">How does this work?</a>
                      </li>
                    </ul>
                    <p class="mb-0 fw-semibold">
                      <a href="javascript:void(0);">27 articles</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Knowledge Base -->
</div>

@endsection