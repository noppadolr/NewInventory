
@extends('admin.main')
@section('main')
{{--    <script src="{{asset('jquery.min.js')}}"></script>--}}
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                {{--                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>--}}
                {{--                <li class="breadcrumb-item active" aria-current="page"> Manage Supplier</li>--}}
                {{--                <li class="breadcrumb-item active" aria-current="page"> Supplier All</li>--}}
                <a href="{{route('customer.add')}}" class="btn  btn-inverse-info" >Add Customer</a>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        {{--                        <a href="{{route('supplier.add')}}" class="btn btn-rounded btn-outline-info" style="float: right">Add Supplier</a>--}}
                        <h6 class="card-title">Customer All Data</h6>
                        <br><br>

                        <div class="table-responsive" style="font-family: 'Sarabun', sans-serif;">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr style="font-weight: bold;font-size: 18px">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Customer Image</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody style="font-weight: 100;font-size: 14px">
                                @foreach($customers as $key => $item)
                                    <tr id="sid{{$item->id}}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{asset($item->customer_image)}}" class="avatar-lg  rounded" style="width: 80px;height: auto;" alt=""></td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>
                                            <a href="{{ route('customer.edit',$item->id) }}" class="btn btn-inverse-warning" title="Edit Data">
                                                <i class="me-1 icon-md" data-feather="edit"></i>

                                            </a>
{{--                                            <a href="{{ route('customer.delete',$item->id) }}" class="btn btn-inverse-danger"--}}
{{--                                               id="delete"  title="Delete Data" >--}}
                                                <a href="javascript:void(0)" class="btn btn-inverse-danger"
                                                    title="Delete Data"   onclick="deleteCustomer({{$item->id}})">

                                                <i class="me-1 icon-md" data-feather="trash-2"></i>

                                            </a>


                                        </td>
                                    </tr>
                                @endforeach




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<script type="text/javascript">
    function deleteCustomer(id)
    {
        // $(document).on('click','#delete',function(id){
        // e.preventDefault();
        // var link = $(this).attr("href");


        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:'delete/'+id,
                    type:'DELETE',
                    {{--data: {_token: $("input[name=_token]").val(),{{csrf_token()}} },--}}
                    {{--data: { somefield: "Some field value", _token: '{{csrf_token()}}' },--}}
                    data: {
                        _token: '{!! csrf_token() !!}',
                    },
                    success:function (response)
                    {
                        $("#sid" + id).remove();
                    },

                    });

                Swal.fire(
                    {
                        title:  'Deleted!',
                        text: 'Your file has been deleted.',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'

                    }).then((result)=>{
                        location.reload()
                    }
                )
            }
        })

    }

</script>




@endsection
