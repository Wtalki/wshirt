@extends('layout.master')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <!--begin::Toolbar wrapper-->
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            Profile</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Products-->
                <div class="card card-flush p-3">
                    <!--begin::Card header-->
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="card w-100 " style="min-height: 300px;">
                                        <div class=" card-body ">
                                            <form action="{{route('profile#edit')}}" method="POST" enctype="multipart/form-data" id="myForm">
                                                @csrf
                                                <div class=" d-flex justify-content-evenly mt-3 h-100 ">
                                                    <div class="bg-light h-100 w-50 shadow-sm">
                                                        <div class="image-input image-input-empty w-100 h-100" data-kt-image-input="true">
                                                            <!--begin::Image preview wrapper-->
                                                            @if (Auth::user()->image == null)
                                                            <div class="image-input-wrapper w-100 " style="background-image: url('{{ asset('default/male.png') }}');height:250px; background-position:center;">
                                                            </div>
                                                            @else
                                                            <div class="image-input-wrapper w-100 " style="background-image: url('{{ asset('storage/'.Auth::user()->image) }}');height:250px; background-position:center;">
                                                            </div>
                                                            @endif
                                                            <!--end::Image preview wrapper-->

                                                            <!--begin::Edit button-->
                                                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change avatar">
                                                                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                                                                <!--begin::Inputs-->
                                                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Edit button-->

                                                            <!--begin::Cancel button-->
                                                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel avatar">
                                                                <i class="ki-outline ki-cross fs-3"></i>
                                                            </span>
                                                            <!--end::Cancel button-->

                                                            <!--begin::Remove button-->
                                                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove avatar">
                                                                <i class="ki-outline ki-cross fs-3"></i>
                                                            </span>
                                                            <!--end::Remove button-->
                                                        </div>
                                                    </div>
                                                    <div class="w-100 ms-5 shadow-sm p-3">
                                                        <div class="mb-10">
                                                            <label for="exampleFormControlInput1" class="required form-label">Name</label>
                                                            <input type="text" name="name" class="form-control form-control-solid" value="{{Auth::user()->name}}" placeholder="Name..." />
                                                        </div>
                                                        <div class="mb-10">
                                                            <label for="exampleFormControlInput1" class="required form-label">Email</label>
                                                            <input type="email" name="email" class="form-control form-control-solid" value="{{Auth::user()->email}}" placeholder="Email..." />
                                                        </div>
                                                        <div class="mb-10">
                                                            <label for="exampleFormControlInput1" class="required form-label">Phone</label>
                                                            <input type="text" name="phone" class="form-control form-control-solid" value="{{Auth::user()->phone}}" placeholder="Phone..." />
                                                        </div>
                                                        <div class="mb-10">
                                                            <label for="exampleFormControlInput1" class="required form-label">Address</label>
                                                            <input type="text" name="address" class="form-control form-control-solid" value="{{Auth::user()->address}}" placeholder="Address..." />
                                                        </div>
                                                        <div class="">
                                                            <button class="btn btn-primary" type="submit">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
@endsection

@section('scriptSource')
<script>
    $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    image: {
                        accept: 'image/jpg,image/jpeg,image/png,'
                    }
                },
                messages: {
                    name: {
                        required: 'please enter your name',
                    },
                    email: {
                        required: 'please enter your email address',
                    },
                    phone: {
                        required: 'please enter your phone number'
                    },
                    address: {
                        required: 'please enter your address'
                    },
                    image: {
                        accept: 'please upload a valid image file (jpeg,png,jpg)',
                    }
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    if (element.attr("type") === "file") {
                        error.appendTo(element.closest(
                        '.mb-3')); // Place error message after the file input
                    } else {
                        error.addClass('invalid-feedback');
                        error.insertAfter(element); // Place error message after the input element
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                }
            })
        })
</script>
@endsection
