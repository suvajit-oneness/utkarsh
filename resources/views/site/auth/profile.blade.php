@extends('site.partials.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

<section class="gry-bg py-4 profile">
   <div class="container">
      <div class="row cols-xs-space cols-sm-space cols-md-space">
         @include('site.auth.partials.profile')
         <div class="col-lg-9">
            <div class="main-content">
               <!-- Page title -->
               <div class="page-title">
                  <div class="row align-items-center">
                     <div class="col-md-6 col-12">
                        <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                           Manage Profile
                        </h2>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="float-md-right">
                           <ul class="breadcrumb">
                              <li><a href="">Home</a></li>
                              <li><a href="">Dashboard</a></li>
                              <li class="active"><a href="">Manage Profile</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <form action="{{ route('site.updateprofile') }}" method="post" enctype="multipart/form-data">
                  @csrf                            
                  <div class="form-box bg-white mt-4">
                     <div class="form-box-title px-3 py-2">
                        Basic info
                     </div>
                     <div class="form-box-content p-3">
                        <div class="row">
                           <div class="col-md-2">
                              <label>Your Name</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" placeholder="Your Name" name="name" value="{{ Auth::guard('users')->user()->name }}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2">
                              <label>Your Email</label>
                           </div>
                           <div class="col-md-10">
                              <input type="email" class="form-control mb-3" placeholder="Your Email" name="email" value="{{ Auth::guard('users')->user()->email }}" disabled="">
                           </div>
                        </div>
                        {{-- <div class="row">
                           <div class="col-md-2">
                              <label>Photo</label>
                           </div>
                           <div class="col-md-10">
                              <input type="file" name="photo" id="file-3" class="custom-input-file custom-input-file 4" value="{{ old('image',Auth::guard('users')->user()->image) }}">
                              <label for="file-3" class="mw-100 mb-3">
                              <span></span>
                              <strong>
                              <i class="fa fa-upload"></i>
                              Choose image
                              </strong>
                              </label>
                           </div>
                        </div> --}}
                        <div class="row">
                           <div class="col-md-2">
                              <label>Your Password</label>
                           </div>
                           <div class="col-md-10">
                              <input type="password" class="form-control mb-3" placeholder="New Password" name="password">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2">
                              <label>Confirm Password</label>
                           </div>
                           <div class="col-md-10">
                              <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="new_password">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-box bg-white mt-4">
                     <div class="form-box-title px-3 py-2">
                        Shipping info
                     </div>
                     <div class="form-box-content p-3">
                        <div class="row">
                           <div class="col-md-2">
                              <label>Address</label>
                           </div>
                           <div class="col-md-10">
                              <textarea class="form-control textarea-autogrow mb-3" placeholder="Your Address" rows="3" name="address">{{ empty($user->shipping->address) ? null : $user->shipping->address }}</textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2">
                              <label>Country</label>
                           </div>
                           <div class="col-md-10">
                              <div class="mb-3">
                                 <select class="form-control mb-3 " data-placeholder="Select your country" name="country">
                                    <option value="India">India</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2">
                              <label>City</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" placeholder="Your City" name="city" value="{{ empty($user->shipping->city) ? null : $user->shipping->city }}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2">
                              <label>Postal Code</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" placeholder="Your Postal Code" name="pin_code" value="{{ empty($user->shipping->pin_code) ? null : $user->shipping->pin_code }}" maxlength="7" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2">
                              <label>Phone</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" placeholder="Your Phone Number" name="phone" value="{{ empty($user->shipping->phone) ? null : $user->shipping->phone }}"  maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4">
                     <button type="submit" class="btn btn-styled btn-base-1">Update Profile</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection