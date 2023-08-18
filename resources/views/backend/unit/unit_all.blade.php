
@extends('admin.main')
@section('main')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                {{--                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>--}}
                {{--                <li class="breadcrumb-item active" aria-current="page"> Manage Supplier</li>--}}
                {{--                <li class="breadcrumb-item active" aria-current="page"> Supplier All</li>--}}
                <a href="" class="btn  btn-inverse-info" >Add Unit</a>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        {{--                        <a href="{{route('supplier.add')}}" class="btn btn-rounded btn-outline-info" style="float: right">Add Supplier</a>--}}
                        <h6 class="card-title">Unit All Data</h6>
                        <br><br>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>


                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody style="font-size: 14px">
                                @foreach($units as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>

                                        <td>
                                            <a href="" class="btn btn-inverse-warning" title="Edit Data">
                                                <i class="me-1 icon-md" data-feather="edit"></i>

                                            </a>
                                            <a href="" class="btn btn-inverse-danger" title="Delete Data" id="delete">
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


@endsection

