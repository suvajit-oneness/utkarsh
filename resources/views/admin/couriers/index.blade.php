@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
   <div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.couriers.create') }}" class="btn btn-primary pull-right">Add New</a>
    </div>
    </div>
    @include('admin.partials.flash')
    <div class="alert alert-success" id="success-msg" style="display: none;">
        <span id="success-text"></span>
    </div>
    <div class="alert alert-danger" id="error-msg" style="display: none;">
        <span id="error-text"></span>
    </div>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Weight</th>
                                <th>Weight in Gram</th>
                                <th>Economy Price</th>
                                <th>Express Price</th>
                                <th>COD Charges</th>
                                <th>Free Shipping</th>
                                <th>Website</th>
                                <th> Status </th>
                                <th class="align-center" style="width:100px; min-width:30px;" class=""> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $slno =1; @endphp
                            @foreach($courier as $courier)
                                <tr>
                                    <td> {{ $slno }}</td>
                                    <td>{{ $courier['name'] }}</td>
                                    <td>{{ $courier['weight'] }} {{ $courier['weight_denomination'] }}</td>
                                    <td> 
                                      @if($courier['weight_denomination']=='Kgs'){{$courier['weight'] * 1000}}
                                      @elseif($courier['weight_denomination']=='Grams') {{$courier['weight'] }}
                                      @else {{'Not Specified'}} 
                                      @endif </td>
                                    <td></td>

                                    <td> {{ $courier['economy'] }}</td>
                                    <td> {{ $courier['express'] }}</td>
                                    <td>
                                      @if($courier['shipping']== 1 ){{ 'Yes' }}
                                      @elseif($courier['shipping']== 2) {{ 'No' }}
                                      @else {{'Not Specified'}} 
                                      @endif
                                  </td>
                                  <td> {{ $courier['website'] }}</td>
                                    <td class="text-center">
                                    <div class="toggle-button-cover margin-auto">
                                        <div class="button-cover">
                                            <div class="button-togglr b2" id="button-11">
                                                <input id="toggle-block" type="checkbox" name="is_active" class="checkbox" data-user_id="{{ $courier['id'] }}" {{ $courier['is_active'] == 1 ? 'checked' : '' }}>
                                                <div class="knobs"><span>Inactive</span></div>
                                                <div class="layer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="align-center">
                                        <a href="{{ route('admin.couriers.edit', $courier->id) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-pencil"></i></a>
                                       <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="#" data-id="{{$courier['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                    </div>
                                    </td>
                                </tr>
                            @php $slno ++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
@endpush
@push('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable({"ordering": false});
    </script>
    <script type="text/javascript">
    $('.sa-remove').on("click",function(){
        var userid = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover the record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "couriers/"+userid+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
    <script type="text/javascript">
        $('input[id="toggle-block"]').change(function() {
            var user_id = $(this).data('user_id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var is_active = 0;
          if($(this).is(":checked")){
              is_active = 1;
          }else{
            is_active = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('admin.couriers.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:user_id, is_active:is_active},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                },
                error: function(response)
                {
                    
                  swal("Error!", response.message, "error");
                }
              });
        });
    </script>
@endpush