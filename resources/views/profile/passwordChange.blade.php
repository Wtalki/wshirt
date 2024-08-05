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
                                            <form action="{{route('password#change')}}" method="POST" id="myForm">
                                                @csrf
                                                <div class="  mt-3 h-100 ">
                                                    @if(session('success'))
                                                    <!--begin::Alert-->
                                                    <div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row p-5 ">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                        <!--end::Icon-->

                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-column pe-0 pe-sm-10">
                                                            <!--begin::Title-->
                                                            <h4 class="fw-semibold">{{session('success')}}</h4>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                        <!--begin::Close-->
                                                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                                            <i class="ki-duotone ki-cross fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                        </button>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--end::Alert-->
                                                    @elseif(session('notMatch'))
                                                    <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 ">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                        <!--end::Icon-->

                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-column pe-0 pe-sm-10">
                                                            <!--begin::Title-->
                                                            <h4 class="fw-semibold">{{session('notMatch')}}</h4>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                        <!--begin::Close-->
                                                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                                            <i class="ki-duotone ki-cross fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                        </button>
                                                        <!--end::Close-->
                                                    </div>
                                                    @endif

                                                    <div class="w-100 ms-5 shadow-sm p-3">
                                                        <div class="mb-10">
                                                            <label for="exampleFormControlInput1" class="required form-label">Old Password</label>
                                                            <input type="password" name="oldPassword" class="form-control form-control-solid" placeholder="Old password..." />

                                                        </div>
                                                        <div class="mb-10">
                                                            <label for="exampleFormControlInput1" class="required form-label">New Password</label>
                                                            <input type="password" name="newPassword" id="newPassword" class="form-control form-control-solid newPassword" placeholder="New Password..." />
                                                        </div>
                                                        <div class="mb-10">
                                                            <label for="exampleFormControlInput1" class="required form-label">New Password Confirm</label>
                                                            <input type="password" name="newConfirmPassword" class="form-control form-control-solid" placeholder="New password confirm..." />
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
                    oldPassword: {
                        required: true,
                        minlength:8,
                    },
                    newPassword: {
                        required: true,
                        minlength:8,
                    },
                    newConfirmPassword: {
                        required: true,
                        equalTo:'.newPassword'
                    },

                },
                messages: {
                    oldPassword: {
                        required: 'please enter old password',

                    },
                    newPassword: {
                        required: 'please enter your new password',
                        minlength:'password must be at least 8 characters',
                    },
                    newConfirmPassword: {
                        required: 'please enter your new confirmation password',
                        equalTo:'the confirmation password are not equal to the new password',
                    },
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        error.insertAfter(element); // Place error message after the input element
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
