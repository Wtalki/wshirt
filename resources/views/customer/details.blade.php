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
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="../dist/index.html" class="text-gray-500">
                                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Sale</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700">Customer Detail</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Customer Details</h1>
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
                                                    <img src="" alt="">
                                                </div>
                                                <div class="w-100 ms-5 shadow-sm p-3">
                                                    <h1>Details </h1>
                                                    <hr class="mt-5">
                                                    <div class="text-center d-flex justify-content-between mt-3">
                                                        <h4>Name</h4>
                                                        <p class="opacity-75">Zaw lay</p>
                                                    </div>
                                                    <div class="text-center d-flex justify-content-between mt-3">
                                                        <h4>email</h4>
                                                        <p class="opacity-75">zaw@gmail.com</p>
                                                    </div>
                                                    <div class="text-center d-flex justify-content-between mt-3">
                                                        <h4>Phone</h4>
                                                        <p class="opacity-75">939849384</p>
                                                    </div>
                                                    <div class="text-center d-flex justify-content-between mt-3">
                                                        <h4>Address</h4>
                                                        <p class="opacity-75">Yangon</p>
                                                    </div>
                                                    <div class="text-center d-flex justify-content-between mt-3">
                                                        <h4>Gender</h4>
                                                        <p class="opacity-75">male</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="card w-100">
                                        <div class="card-header d-flex align-items-center">
                                            <h1 class="opacity-8">Payment Record</h1>
                                        </div>
                                        <div class="card-body ">
                                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                                <thead>
                                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="min-w-125px">Invonice Number</th>
                                                        <th class="min-w-125px">Status</th>
                                                        <th class="min-w-125px">Amount</th>
                                                        <th class="min-w-125px">Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary mb-1">38474-3438</a>
                                                        </td>

                                                        <td>
                                                            <span class="badge badge-light-success">Successful</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">12000$</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">3/3/2000</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary mb-1">38474-3438</a>
                                                        </td>

                                                        <td>
                                                            <span class="badge badge-light-success">Successful</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">12000$</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">3/3/2000</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary mb-1">38474-3438</a>
                                                        </td>

                                                        <td>
                                                            <span class="badge badge-light-success">Successful</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">12000$</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">3/3/2000</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary mb-1">38474-3438</a>
                                                        </td>

                                                        <td>
                                                            <span class="badge badge-light-success">Successful</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">12000$</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">3/3/2000</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary mb-1">38474-3438</a>
                                                        </td>

                                                        <td>
                                                            <span class="badge badge-light-success">Successful</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">12000$</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-600 text-hover-primary mb-1">3/3/2000</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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