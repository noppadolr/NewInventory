
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
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{asset($item->customer_image)}}" class="avatar-lg  rounded" style="width: 80px;height: auto;" alt=""></td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>
                                            <a href="{{ route('customer.edit',$item->id) }}" class="btn btn-inverse-warning" title="Edit Data">
                                                <i class="me-1 icon-md" data-feather="edit"></i>

                                            </a>
                                            <a href="{{ route('customer.delete',$item->id) }}" class="btn btn-inverse-danger"
                                               id="delete"  title="Delete Data" >

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

{{--    <script type="text/javascript">--}}
{{--    @if(Session::has('swimage'))--}}
{{--        window.onload = function () {--}}
{{--            Swal.fire({--}}
{{--                position: 'top-end',--}}
{{--                toast: true,--}}
{{--                icon: 'success',--}}
{{--                title: 'Customer Update with Image Successfully',--}}
{{--                showConfirmButton: false,--}}
{{--                timer: 3000,--}}
{{--                timerProgressBar: true,--}}
{{--            })--}}
{{--        }--}}
{{--    @endif--}}

{{--    @if(Session::has('SwNoImage'))--}}
{{--            // window.onload = function () {--}}
{{--    window.onload =function(){--}}
{{--        showSwal('message-with-auto-close');--}}
{{--        // Swal.fire({--}}
{{--        //         position: 'top-end',--}}
{{--        //         toast: true,--}}
{{--        //         icon: 'success',--}}
{{--        //         title: 'Customer Update without Image Successfully',--}}
{{--        //         showConfirmButton: false,--}}
{{--        //         timer: 3000,--}}
{{--        //         timerProgressBar: true,--}}
{{--        //     })--}}
{{--        }--}}
{{--    @endif--}}
{{--        @if(Session::has('Inserted'))--}}
{{--        window.onload = function () {--}}
{{--        Swal.fire({--}}
{{--            position: 'top-end',--}}
{{--            toast: true,--}}
{{--            icon: 'success',--}}
{{--            title: 'บันทึกข้อมุลลูกค้าเรียบร้อย',--}}
{{--            showConfirmButton: false,--}}
{{--            timer: 3000,--}}
{{--            timerProgressBar: true,--}}
{{--        })--}}

{{--    }--}}
{{--        @endif--}}

{{--    </script>--}}

@endsection

