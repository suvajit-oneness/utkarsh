@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.productstock.create') }}" class="btn btn-primary pull-right">Add New</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Product Name</th>
                            <th>Sku Code</th>
                            <th>Current Stock</th>
                            <th>Stock Alert</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $slno =1; @endphp
                            @foreach($productstock as $products)
                                <tr>
                                    <td>{{ $slno }}</td>
                                    <td>{{ $products->product->name }}</td>
                                    <td>{{ empty($products->product->code) ? '' : $products->product->code  }}</td>
                                    <td>{{ $products->current_stock }}</td>
                                    <td>{{ $products->stock_alert }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.productstock.edit', $products->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
            
                                            <a href="#" data-id="{{$products['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @php $slno++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
    $('.sa-remove').on("click",function(){
        var categoryId = $(this).data('id');
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
            window.location.href = "productstock/"+categoryId+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
@endpush