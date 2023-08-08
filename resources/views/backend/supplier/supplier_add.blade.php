@extends('admin.main')
@section('main')

    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Manage Supplier</li>
                <li class="breadcrumb-item active" aria-current="page"> Add Supplier</li>
            </ol>
        </nav>

        <div class="row profile-body">


            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Supplier</h6>
                            <br>
                            <form class="forms-sample" method="POST" action="" enctype="multipart/form-data" >
                                @csrf


                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Supplier Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                               class="form-control "
                                               id="name"
                                               name="name" >
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="mobile_no" class="col-sm-3 col-form-label">Supplier Mobile</label>
                                    <div class="col-sm-9">
                                        <input  type="text"
                                                class="form-control "
                                                id="mobile_no"
                                                name="mobile_no" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email Adderss</label>
                                    <div class="col-sm-9">
                                        <input  type="email"
                                                class="form-control "
                                                id="email"
                                                name="email" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-sm-3 col-form-label">Supplier Adderss</label>
                                    <div class="col-sm-9">
                                        <input  type="text"
                                                class="form-control "
                                                id="address"
                                                name="address" >
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-outline-warning   me-2">Add Supplier</button>

                            </form>

                        </div>
                    </div>



                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>



@endsection

