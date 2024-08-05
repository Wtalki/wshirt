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
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Profile</h1>
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
                                            <div class=" d-flex justify-content-evenly mt-3 h-100 ">
                                                <div class="bg-light h-100 w-50 shadow-sm">
                                                    @if (Auth::user()->image == null)
                                                    <img src="{{asset('default/male.png')}}" alt="user" />
                                                    @else
                                                    <img alt="Logo" class="w-100" src="{{asset('storage/'.Auth::user()->image)}}" />
                                                    @endif
                                                </div>
                                                <div class="w-100 ms-5 shadow-sm p-3">
                                                    <div class="d-flex justify-content-between">
                                                        <h1>Details </h1>
                                                        <a href="{{route('edit#profile')}}" class="btn badge badge-primary">Edit</a>
                                                    </div>
                                                    <hr class="mt-5">
                                                    <div class="text-center d-flex justify-content-between mt-3">
                                                        <h4>Name</h4>
                                                        <p class="opacity-75">{{Auth::user()->name}}</p>
                                                    </div>
                                                    <div class="text-center d-flex justify-content-between mt-3">
                                                        <h4>email</h4>
                                                        <p class="opacity-75">{{Auth::user()->email}}</p>
                                                    </div>
                                                    <div class="text-center d-flex justify-content-between mt-3">
                                                        <h4>Phone</h4>
                                                        <p class="opacity-75">{{Auth::user()->phone}}</p>
                                                    </div>
                                                    <div class="text-center d-flex justify-content-between mt-3">
                                                        <h4>Address</h4>
                                                        <p class="opacity-75">{{Auth::user()->address}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <h2>Password Change</h2>
                                            <a href="{{route('password#changePage')}}" class="btn btn-danger">Change Password</a>
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
