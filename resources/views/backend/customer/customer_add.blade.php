@extends('admin.main')
@section('main')
    <script src="{{asset('jquery.min.js')}}"></script>
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Manage Customer</li>
                <li class="breadcrumb-item active" aria-current="page"> Add Customer</li>
            </ol>
        </nav>

        <div class="row profile-body">


            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Customer</h6>
                            <br>
                            <form id="myForm" class="forms-sample" method="POST" action=""  enctype="multipart/form-data">
                                @csrf


                                <div class="row mb-3">
                                    <label for="name" class="col-sm-1 col-form-label">Name</label>
                                    <div class="col-sm-11 form-group">
                                        <input type="text"
                                               class="form-control "
                                               id="name"
                                               name="name" >
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="mobile_no" class="col-sm-1 col-form-label">Phone</label>
                                    <div class="col-sm-11 form-group">
                                        <input  type="text"
                                                class="form-control "
                                                id="mobile_no"
                                                name="mobile_no" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-1 col-form-label">Email</label>
                                    <div class="col-sm-11 form-group">
                                        <input  type="email"
                                                class="form-control "
                                                id="email"
                                                name="email" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-sm-1 col-form-label">Address</label>
                                    <div class="col-sm-11 form-group">
                                        <input  type="text"
                                                class="form-control "
                                                id="address"
                                                name="address" >
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label" for="image">Photo</label>
                                    <div class="col-sm-11 form-group">
                                        <input class="form-control" type="file" name="customer_image" id="image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label" for="image"></label>
                                    <div class="col-sm-11">
                                        <img id="showImage" class="avatar-lg wd-150 rounded" src="{{ url('upload/no_image.jpg') }}"  alt="profile">
                                    </div>
                                </div>
                                <br>









                                <br>






                                <button type="submit" class="btn btn-outline-warning   me-2">Add Customer</button>

                            </form>

                        </div>
                    </div>



                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    },
                    mobile_no: {
                        required : true,
                    },
                    email: {
                        required : true,
                    },
                    address: {
                        required : true,
                    },
                    customer_image: {
                        required : true,
                    },

                },
                messages :{
                    name: {
                        required : 'Please Enter Customer Name',
                    },
                    mobile_no: {
                        required : 'Please Enter Customer Phone Number',
                    },
                    email: {
                        required : 'Please Enter Customer Email Address',
                    },
                    address: {
                        required : 'Please Enter Customer Address',
                    },
                    customer_image: {
                        required : 'Please Select Customer Image',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>


@endsection

