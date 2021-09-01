@extends('admin.app')
@section('title') {{ 'Vendor Edit' }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ 'Edit vendor' }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ 'Edit vendor' }}
                    <span class="top-form-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Vendor</button>
                        <a class="btn btn-secondary" href="{{ route('admin.vendor.list') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span>
                </h3>
                <hr>
                <form action="{{ route('admin.vendor.update',$vendor->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="vendorId" value="{{$vendor->id}}">
                    @error('vendorId') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                    <div class="tile-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $vendor->name}}"/>
                                @error('name') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{$vendor->email }}" readonly />
                                @error('email') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label" for="contact_person">Contact person <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('contact_person') is-invalid @enderror" type="text" name="contact_person" id="contact_person" value="{{ $vendor->contact_person }}"/>
                                @error('contact_person') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" for="contact_mobile">Contact Number <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('contact_mobile') is-invalid @enderror" type="text" name="contact_mobile" id="contact_mobile" value="{{ $vendor->contact_mobile }}"/>
                                @error('contact_mobile') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label" for="address">Address <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ $vendor->address }}"/>
                                @error('address') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" for="state">State <span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="state">
                                    @foreach($state as $key => $sta)
                                        <option value="{{$sta->id}}" @if($vendor->state == $sta->id){{('selected')}}@endif>{{$sta->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label" for="pan">Pan Number <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('pan') is-invalid @enderror" type="text" name="pan" id="pan" value="{{ $vendor->pan }}"/>
                                @error('pan') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" for="tin_number">Tin Number <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('tin_number') is-invalid @enderror" type="text" name="tin_number" id="tin_number" value="{{ $vendor->tin_number }}"/>
                                @error('tin_number') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label" for="gstin_number">GSTIN Number <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('gstin_number') is-invalid @enderror" type="text" name="gstin_number" id="gstin_number" value="{{ $vendor->gstin_number }}"/>
                                @error('gstin_number') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" for="servicetax_number">Service Tax Number <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('servicetax_number') is-invalid @enderror" type="text" name="servicetax_number" id="servicetax_number" value="{{ $vendor->servicetax_number }}"/>
                                @error('servicetax_number') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label" for="gst_category">GST Category <span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="gst_category" id="gst_category">
                                    <option value="Registred" @if($vendor->gst_category == 'Registred'){{('selected')}}@endif>Registred</option>
                                </select>
                                @error('gst_category') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label" for="account_number">Account Number <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('account_number') is-invalid @enderror" type="text" name="account_number" id="account_number" value="{{ $vendor->account_number }}"/>
                                @error('account_number') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label" for="ifsc_code">IFSC CODE <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('ifsc_code') is-invalid @enderror" type="text" name="ifsc_code" id="ifsc_code" value="{{$vendor->ifsc_code}}"/>
                                @error('ifsc_code') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label" for="bank_address">Bank Address <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('bank_address') is-invalid @enderror" type="text" name="bank_address" id="bank_address" value="{{$vendor->bank_address}}"/>
                                @error('bank_address') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="name">Description <span class="m-l-5 text-danger"> *</span></label>
                        <textarea class="form-control ckeditor" name="description" id="description">{{ $vendor->description }}</textarea>
                        @error('description') {{ $message ?? '' }} @enderror
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Vendor</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.blog.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/plugins/ckeditor/ckeditor.js') }}"></script>
@endpush