<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{ $pageTitle }} - {{ config('app.name') }}</title>
      <!-- Fonts -->
      <link type="text/css" href="{{ asset('frontend/css/style1.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
      <!-- Bootstrap -->
      <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
      <!-- Icons -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
      <link type="text/css" href="{{ asset('frontend/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
      <link type="text/css" href="{{ asset('frontend/css/jodit.min.css') }}" rel="stylesheet">
      <link type="text/css" href="{{ asset('frontend/css/sweetalert2.min.css') }}" rel="stylesheet">
      <link type="text/css" href="{{ asset('frontend/css/slick.css') }}" rel="stylesheet">
      <link type="text/css" href="{{ asset('frontend/css/xzoom.css') }}" rel="stylesheet">
      <link type="text/css" href="{{ asset('frontend/css/jquery.share.css') }}" rel="stylesheet">
      <!-- Global style (main) -->
      <link type="text/css" href="{{ asset('frontend/css/active-shop.css') }}" rel="stylesheet" media="screen">
      <!--Spectrum Stylesheet [ REQUIRED ]-->
      <link href="{{ asset('frontend/css/spectrum.css') }}" rel="stylesheet">
      <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
      <!-- Custom style -->
      <link  href="{{ asset('frontend/css/custom-style.css') }}" type="text/css" rel="stylesheet">
      <!-- color theme -->
      <link href="{{ asset('frontend/css/default.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
      <!-- jQuery -->
      <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
   </head>
   <body>
      <!-- MAIN WRAPPER -->
      <div class="body-wrap shop-default shop-cards shop-tech gry-bg">
         <!-- Header -->
         <div class="header bg-white">
            <!-- mobile menu -->
            <div class="mobile-side-menu d-lg-none">
               <div class="side-menu-overlay opacity-0"></div>
               <div class="side-menu-wrap opacity-0" onclick="sideMenuClose()">
                  <div class="side-menu closed">
                     <div class="side-menu-header ">
                        <div class="side-menu-close" onclick="sideMenuClose()">
                           <i class="fa fa-close"></i>
                        </div>
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                           <div class="image"> <img src="{{ asset('frontend/img/icon/user-placeholder.jpg') }}" width="100%"> </div>
                        </div>
                        <div class="side-login px-3 pb-3">
                           <a href="{{ route('site.login') }}">Sign In</a>
                           <a href="{{ route('site.registration') }}">Registration</a>
                        </div>
                     </div>
@php 
$categories = App\Models\Category::where('is_active',1)->where('is_deleted',0)->get();
@endphp
                     <div class="side-menu-list px-3">
                        <div class="sidebar-widget-title py-0">
                           <span>Categories</span>
                        </div>
                        <ul class="side-seller-menu">
                           @if($categories)
                              @foreach($categories as $n)
                              @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
                           <li >
                              <a href="{!! URL::to('product-list/'.$n->id.'/'.$key) !!}" class="text-truncate fill_content ">
                              <span>{{ $n->name }} </span>
                              </a>
                              {{-- <div id="category-1" class="right-top-nav">
                                 <ul class="sub_cat_ul">
                                    <li><a href="" class="text-truncate" >All WOMEN</a></li>
                                    <li><a href="" class="text-truncate" >ABAYAS &amp; JILBABS</a></li>
                                    <li><a href="" class="text-truncate" >CAPE COATS &amp; SHRUGS</a></li>
                                 </ul>
                              </div> --}}
                           </li>
                           @endforeach
                           @endif
                           {{-- <li >
                              <a href="" class="text-truncate fill_content ">
                              <span>MEN</span>
                              </a>
                              <div id="category-2" class="right-top-nav">
                                 <ul class="sub_cat_ul">
                                    <li><a href="" class="text-truncate" >All MEN</a></li>
                                    <li><a href="" class="text-truncate" >THOBES</a></li>
                                    <li><a href="" class="text-truncate" >IZAAR</a></li>
                                    <li><a href="" class="text-truncate" >PATHANI SUITS</a></li>
                                 </ul>
                              </div>
                           </li>
                           <li >
                              <a href="" class="text-truncate fill_content">
                              <span>KIDS AND TEENS</span>
                              </a>
                              <div id="category-3" class="right-top-nav">
                                 <ul class="sub_cat_ul">
                                    <li><a href="" class="text-truncate" >All KIDS AND TEENS</a></li>
                                    <li><a href="" class="text-truncate" >BOYS</a></li>
                                    <li><a href="" class="text-truncate" >Izaar</a></li>
                                    <li><a href="" class="text-truncate" >GIRLS</a></li>
                                    <li><a href="" class="text-truncate" >KIDS PATHANI SUIT</a></li>
                                 </ul>
                              </div>
                           </li>
                           <li >
                              <a href="" class="text-truncate fill_content ">
                              <span>HIJAB</span>
                              </a>
                              <div id="category-6" class="right-top-nav">
                                 <ul class="sub_cat_ul">
                                    <li><a href="" class="text-truncate" >All MEN</a></li>
                                    <li><a href="" class="text-truncate" >THOBES</a></li>
                                    <li><a href="" class="text-truncate" >IZAAR</a></li>
                                    <li><a href="" class="text-truncate" >PATHANI SUITS</a></li>
                                 </ul>
                              </div>
                           </li> --}}
                           {{-- <li >
                              <a href="" class="text-truncate fill_content " >
                              <span>MADE TO MEASURE </span>
                              </a>
                              <div id="category-8" class="right-top-nav">
                                 <ul class="sub_cat_ul">
                                    <li><a href="" class="text-truncate" >All MADE TO MEASURE </a></li>
                                 </ul>
                              </div>
                           </li>
                           <li >
                              <a href="" class="text-truncate fill_content ">
                              <span>MENS NEW COLLECTION 2020</span>
                              </a>
                              <div id="category-12" class="right-top-nav">
                                 <ul class="sub_cat_ul">
                                    <li><a href="" class="text-truncate" >All MENS NEW COLLECTION 2020</a></li>
                                 </ul>
                              </div>
                           </li>
                           <li >
                              <a href="" class="text-truncate fill_content ">
                              <span>COMING SOON</span>
                              </a>
                              <div id="category-13" class="right-top-nav">
                                 <ul class="sub_cat_ul">
                                    <li><a href="" class="text-truncate" >All COMING SOON</a></li>
                                    <li><a href="" class="text-truncate" >Men</a></li>
                                    <li><a href="" class="text-truncate" >Boys</a></li>
                                    <li><a href="" class="text-truncate" >Girls</a></li>
                                 </ul>
                              </div>
                           </li> --}}
                        </ul>
                        <ul class="side-user-menu">
                           {{-- <li>
                              <a href="">
                              <i class="fa fa-home"></i>
                              <span>WHOLESALE &amp; RETAIL</span>
                              </a>
                           </li> --}}
                           <li>
                              <a href="{{ route('site.home') }}">
                              <span>Home</span>
                              </a>
                           </li>
                           <li>
                              <a href="{{ route('site.about') }}">
                              <span>About Us</span>
                              </a>
                           </li>
                           <!--<li>
                              <a href="" style="display:inline-block" >
                              <span>Dashboard</span>
                              </a>
                              <span class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                              </span>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                 <a class="dropdown-item" href="">
                                 <i class="fa fa-file-text"></i>
                                 <span>Purchase History</span>
                                 </a>
                                 <a class="dropdown-item" href="">
                                 <i class="fa fa-user"></i>
                                 <span>Manage Profile</span>
                                 </a>
                                 <a class="dropdown-item" href="" class="">
                                 <i class="fa fa-support"></i>
                                 <span class="category-name">
                                 Support Ticket
                                 </span>
                                 </a>
                              </div>
                           </li>-->
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end mobile menu -->
            <div class="position-relative logo-bar-area">
               <div class="">
                  <div class="container">
                     <div class="row no-gutters align-items-center">
                        <div class="col-lg-3 col-4">
                           <div class="d-flex">
                              <div class="d-block d-lg-none mobile-menu-icon-box">
                                 <!-- Navbar toggler  -->
                                 <a href="#" onclick="sideMenuOpen(this)">
                                    <div class="hamburger-icon">
                                       <span></span>
                                       <span></span>
                                       <span></span>
                                       <span></span>
                                    </div>
                                 </a>
                              </div>
                              <!-- Brand/Logo -->
                              <a class="navbar-brand w-100" href="{{ route('site.home') }}" class="" alt="Mashroo Store"><img src="{{ asset('frontend/img/logo.png') }}" width="100%">
                              </a>
                              <a href="" class="float whatsapp d-none d-lg-inline-block" data-toggle="tooltip" data-original-title="WhatsApp">
                              <button class="open-button btnstyle br-pd">
                              <i class="fa fa-whatsapp fsize"></i>
                              </button>
                              </a>
                              <div class="d-none d-xl-block category-menu-icon-box">
                                 <div class="dropdown-toggle navbar-light category-menu-icon" id="category-menu-icon">
                                    <span class="navbar-toggler-icon"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-9 col-8 position-static">
                           <div class="d-flex w-100">
                              <div class="search-box flex-grow-1 px-4">
                                 <form action="" method="GET">
                                    <div class="d-flex position-relative">
                                       <div class="d-lg-none search-box-back">
                                          <button class="" type="button"><i class="fa fa-long-arrow-left"></i></button>
                                       </div>
                                       <div class="w-100">
                                          <input type="text" aria-label="Search" id="search" name="q" class="w-100" placeholder="I'm shopping for..." autocomplete="off">
                                       </div>
                                       <button class="d-none d-lg-block" type="submit">
                                       <i class="fa fa-search la-flip-horizontal"></i>
                                       </button>
                                       <div class="typed-search-box d-none">
                                          <div class="search-preloader">
                                             <div class="loader">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                             </div>
                                          </div>
                                          <div class="search-nothing d-none">
                                          </div>
                                          <div id="search-content">
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="logo-bar-icons d-inline-block ml-auto">
                                 <div class="d-inline-block d-lg-none">
                                    <div class="nav-search-box">
                                       <a href="#" class="nav-box-link">
                                       <i class="fa fa-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="d-inline-block">
                                    <div class="nav-cart-box" id="wishlist" title="wishlist">
                                       <a href="" class="nav-box-link" target="_blank" data-toggle="tooltip" data-original-title="Log In">
                                       <i class="fa fa-user d-inline-block nav-box-icon"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="d-inline-block">
                                    <div class="nav-compare-box" id="compare">
                                       <a href="{{ route('site.compare') }}" class="nav-box-link">
                                          <i class="fa fa-refresh d-inline-block nav-box-icon"></i>
                                          <!--<span class="nav-box-text d-none d-xl-inline-block">Compare</span>-->
                                          @php 
                                          $compareProducts = App\Models\Compare::where('mac',Request::ip())->get();
                                          @endphp
                                          <span class="nav-box-number">{{ count($compareProducts) }}</span>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="d-inline-block">
                                    <div class="nav-wishlist-box" id="wishlist">
                                       <a href="{{ route('site.wishlist') }}" class="nav-box-link">
                                          <i class="fa fa-heart-o d-inline-block nav-box-icon"></i>
                                          <!--<span class="nav-box-text d-none d-xl-inline-block">Wishlist</span>-->
                                          @if(Auth::guard('users')->check())
                                          @php 
                                          $wishlistProducts = App\Models\Wishlist::where('user_id',Auth::guard('users')->user()->id)->get();
                                          @endphp 
                                          <span class="nav-box-number">{{ count($wishlistProducts) }}</span>
                                          @else
                                          <span class="nav-box-number">0</span>
                                          @endif 
                                       </a>
                                    </div>
                                 </div>
                                 <div class="d-inline-block" data-hover="dropdown">
                                    <div class="nav-cart-box dropdown" id="cart_items">
                                       <a href="{{ route('site.viewcart') }}" class="nav-box-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fa fa-shopping-cart d-inline-block nav-box-icon"></i>
                                          <!--<span class="nav-box-text d-none d-xl-inline-block">Cart</span>-->
                                          @php 
                                          $cartProducts = App\Models\Cart::where('mac',Request::ip())->get();
                                          @endphp 
                                          <span class="nav-box-number">{{ count($cartProducts) }}</span>
                                       </a>
                                       <ul class="dropdown-menu dropdown-menu-right px-0">
                                          <li>
                                             <div class="dropdown-cart px-0">
                                                <div class="dc-header">
                                                   <h3 class="heading heading-6 strong-700">Your Cart is empty</h3>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 @if ($message = session()->has('success'))
                                  <div class="alert alert-success" role="alert">
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                     </button>
                                     {{ session()->get('success') }}
                                   </div>
                                @endif
                                @if ($message = session()->has('error'))
                                  <div class="alert alert-danger" role="alert">
                                    {{ session()->get('error') }}
                                  </div>
                                @endif
                                 <div class="d-inline-block d-lg-none">
                                    <div>
                                       <a href="" class="float"><button class="open-button btnstyle" style=" border-radius:0 !important;" ><i class="fa fa-whatsapp call_wp_icon"  ></i></button></a>
                                    </div>
                                 </div>
                                 <div class="d-inline-block d-lg-none">
                                    <div >
                                       <a href="tel:+919892020933" class="nav-box-link"  >
                                       <i class="fa fa-phone d-inline-block nav-box-icon iconclr call_wp_icon"  ></i>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
@php 
$categories = App\Models\Category::where('is_active',1)->where('is_deleted',0)->get();
@endphp               
               <div class="hover-category-menu" id="hover-category-menu">
                  <div class="container">
                     <div class="row no-gutters position-relative">
                        <div class="col-lg-3 position-static">
                           <div class="category-sidebar" id="category-sidebar">
                              <div class="all-category">
                                 <span>CATEGORIES</span>
                                 <a href="#" class="d-inline-block">See All ></a>
                              </div>
                              <ul class="categories">
                              @if($categories)
                              @foreach($categories as $n)
                              @php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $n->name)) @endphp
                                 <li class="list-li">
                                    <a href="{!! URL::to('product-list/'.$n->id.'/'.$key) !!}">
                                    <img class="cat-image" src="{{ asset('frontend/img/icon/1.png') }}" alt="WOMEN" width="30">
                                    <span class="cat-name">{{ $n->name }}</span>
                                    </a>
                                    @if((!empty($n->level1)) && count($n->level1))
                                    <div class="sub-cat-menu c-scrollbar">
                                       <div class="sub-cat-main row no-gutters">
                                          <div class="col-9">
                                             <div class="sub-cat-content">
                                                <div class="sub-cat-list">
                                                   <div class="card-columns">
                                                     @foreach($n->level1 as $p)
                                                      <div class="card">
                                                         <ul class="sub-cat-items">
                                                            <li><a href="#">{{$p->name  }}</a></li>
                                                         </ul>
                                                      </div>
                                                      @endforeach

                                                      {{-- <div class="card">
                                                         <ul class="sub-cat-items">
                                                            <li><a href="">CAPE COATS &amp; SHRUGS</a></li>
                                                         </ul>
                                                      </div> --}}

                                                   </div>
                                                </div>
                                                <div class="sub-cat-featured">
                                                </div>
                                             </div>
                                          </div>

                                          <div class="col-3">
                                             <div class="sub-cat-brand">
                                                <ul class="sub-brand-list">
                                                   <li class="sub-brand-item">
                                                      <a href="" ><img src="{{ asset('frontend/img/logo.png') }}" alt="Mashroo" class="img-fluid"></a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    @endif
                                 </li>
                                 @endforeach
                                 @endif
                                 {{-- <li class="list-li">
                                    <a href="">
                                    <img class="cat-image" src="{{ asset('frontend/img/icon/2.png') }}" alt="MEN" width="30">
                                    <span class="cat-name">MEN</span>
                                    </a>
                                    <div class="sub-cat-menu c-scrollbar">
                                       <div class="sub-cat-main row no-gutters">
                                          <div class="col-9">
                                             <div class="sub-cat-content">
                                                <div class="sub-cat-list">
                                                   <div class="card-columns">
                                                      <div class="card">
                                                         <ul class="sub-cat-items">
                                                            <li><a href="">THOBES</a></li>
                                                         </ul>
                                                      </div>
                                                      <div class="card">
                                                         <ul class="sub-cat-items">
                                                            <li><a href="">IZAAR</a></li>
                                                         </ul>
                                                      </div>
                                                      <div class="card">
                                                         <ul class="sub-cat-items">
                                                            <li><a href="">PATHANI SUITS</a></li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="sub-cat-featured">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-3">
                                             <div class="sub-cat-brand">
                                                <ul class="sub-brand-list">
                                                   <li class="sub-brand-item">
                                                      <a href="" ><img src="{{ asset('frontend/img/logo.png') }}" alt="Mashroo" class="img-fluid"></a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-li">
                                    <a href="">
                                    <img class="cat-image" src="{{ asset('frontend/img/icon/3.png') }}" alt="KIDS AND TEENS" width="30">
                                    <span class="cat-name">KIDS AND TEENS</span>
                                    </a>
                                    <div class="sub-cat-menu c-scrollbar">
                                       <div class="sub-cat-main row no-gutters">
                                          <div class="col-9">
                                             <div class="sub-cat-content">
                                                <div class="sub-cat-list">
                                                   <div class="card-columns">
                                                      <div class="card">
                                                         <ul class="sub-cat-items">
                                                            <li><a href="">BOYS</a></li>
                                                            <li><a href="">Izaar</a></li>
                                                         </ul>
                                                      </div>
                                                      <div class="card">
                                                         <ul class="sub-cat-items">
                                                            <li><a href="">BOYS</a></li>
                                                            <li><a href="">Izaar</a></li>
                                                         </ul>
                                                      </div>
                                                      <div class="card">
                                                         <ul class="sub-cat-items">
                                                            <li><a href="">BOYS</a></li>
                                                            <li><a href="">Izaar</a></li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="sub-cat-featured">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-3">
                                             <div class="sub-cat-brand">
                                                <ul class="sub-brand-list">
                                                   <li class="sub-brand-item">
                                                      <a href="" ><img src="{{ asset('frontend/img/logo.png') }}" alt="Mashroo" class="img-fluid"></a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-li">
                                    <a href="">
                                    <img class="cat-image" src="{{ asset('frontend/img/icon/4.png') }}" alt="HIJAB" width="30">
                                    <span class="cat-name">HIJAB</span>
                                    </a>
                                    <div class="sub-cat-menu c-scrollbar">
                                       <div class="sub-cat-main row no-gutters">
                                          <div class="col-9">
                                             <div class="sub-cat-content">
                                                <div class="sub-cat-list">
                                                   <div class="card-columns">
                                                      <div class="card">
                                                         <ul class="sub-cat-items">
                                                            <li><a href="">BOYS</a></li>
                                                            <li><a href="">Izaar</a></li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="sub-cat-featured">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-3">
                                             <div class="sub-cat-brand">
                                                <ul class="sub-brand-list">
                                                   <li class="sub-brand-item">
                                                      <a href="" ><img src="{{ asset('frontend/img/logo.png') }}" alt="Mashroo" class="img-fluid"></a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-li">
                                    <a href="">
                                    <img class="cat-image" src="{{ asset('frontend/img/icon/5.png') }}" alt="MADE TO MEASURE " width="30">
                                    <span class="cat-name">MADE TO MEASURE </span>
                                    </a>
                                 </li> --}}

                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Navbar -->
            <div class="main-nav-area d-none d-lg-block hidden" >
               <nav class="navbar navbar-expand-lg navbar--bold navbar--style-2 navbar-light bg-default" style="display:none !important">
                  <div class="container">
                     <div class="collapse navbar-collapse align-items-center justify-content-center" id="navbar_main">
                        <!-- Navbar links -->
                        <ul class="navbar-nav">
                           <li class="nav-item">
                              <a class="nav-link" href="">Kurta</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="">FLOUNCE</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="">New</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="">SOIL BROWN DUAL DAFTS ABAYA</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="">GALLANT</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </nav>
            </div>
         </div>

<!--@php
  $errors = Session::get('error');
  $success = Session::get('success');
@endphp
@if($success)
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
  <script type="text/javascript">
  swal("Success!", "{{ $success }}", "success")
  </script>
@endif
@if ($errors)
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
  <script type="text/javascript">
  swal("Error!", "{{ $errors }}", "error")
  </script>
@endif -->        

<section class="gry-bg py-4">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="p-4 bg-white">
               <div class="col text-center text-md-left">
                  <h3 class=" strong-600 text-uppercase mb-2 text-center">
                     Contact Info
                  </h3>
                  <span class="d-block strong-600">Address:</span>
                  {!! $contactItems::get('address') !!}
                  <span class="d-block strong-600">Phone:</span>
                  <span class="d-block mb-3">{{ $contactItems::get('phone') }}</span>
                  <span class="d-block strong-600">Email:</span>
                  <span class="d-block mb-3">
                  <a href="mailto:{{ $contactItems::get('default_email_address') }}">{{ $contactItems::get('default_email_address') }}</a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="p-4 bg-white">
               <div class="d-inline-block d-md-block">
                  <h3 class=" strong-600 text-uppercase mb-2 text-center">
                     Any Enquiry?
                  </h3>
                  <form class="form-group" method="post" action="{{ route('site.contact.save') }}">
                     @csrf                   
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Your Name" name="name" required="">
                     </div>
                     <div class="form-group mb-3">
                        <input type="email" class="form-control" placeholder="Your Email Address" name="email" required="">
                     </div>
                     <div class="form-group mb-3">
                        <input type="textarea" class="form-control" placeholder="Your Message" name="message" required="">
                     </div>
                     <button type="submit" class="btn btn-base-1 btn-icon-left">
                     Send
                     </button>
                  </form>
               </div>
            </div>
         </div>
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.5067209184094!2d72.8373102143763!3d19.041446058007025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ced27a1e32c5%3A0xaed29e289a7a268a!2sMashroo%20Store!5e0!3m2!1sen!2sin!4v1578135795178!5m2!1sen!2sin" style="border:0;" allowfullscreen="" width="100%" height="350" frameborder="0"></iframe>
      </div>
   </div>
</section>
@include('site.partials.footer')