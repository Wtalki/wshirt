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
                            <li class="breadcrumb-item text-gray-700">Order Listing</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Order Listinge</h1>
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
                                    <div class="card w-100 " style="height: 300px;">
                                        <div class="card-header d-flex align-items-center">
                                            <h1 class="opacity-8">Order</h1>
                                        </div>
                                        <div class=" card-body ">
                                            <div class=" d-flex justify-content-between mt-3">
                                                <span class="fw-bold opacity-60 ms-3">Date Added</span>
                                                <span class="fw-bold opacity-60 ms-3">{{$data->created_at->format('j-F-Y')}}</span>
                                            </div>
                                            <hr class="m-3">
                                            <div class="d-flex justify-content-between mt-3">
                                                <span class="fw-bold opacity-60 ms-3">account name</span>
                                                <span class="fw-bold opacity-60 ms-3">{{$data->user_name}}</span>
                                            </div>
                                            <hr class="m-3">
                                            <div class="d-flex justify-content-between mt-3">
                                                <span class="fw-bold opacity-60 ms-3">Order Code</span>
                                                <span class="fw-bold opacity-60 ms-3">{{$data->order_code}}</span>
                                            </div>
                                            <hr class="m-3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="card w-100 " style="min-height: 300px;">
                                        <div class="card-header d-flex align-items-center">
                                            <h1 class="opacity-8">Billing</h1>
                                        </div>
                                        <div class=" card-body d-flex justify-content-between w-100">
                                            <div class="">
                                                <p class="fw-bold opacity-60 ms-3">Name - {{$data->payments[0]->name}} </p>
                                                <p class="fw-bold opacity-60 ms-3">Phone - {{$data->payments[0]->phone}} </p>
                                                <p class="fw-bold opacity-60 ms-3">Address - {{$data->payments[0]->address}}</p>
                                                <p class="fw-bold opacity-60 ms-3">Transcation id - {{$data->payments[0]->trans_id}}</p>
                                            </div>
                                            <img src="{{asset('storage/'.$data->payments[0]->image)}}" class="w-50 h-50" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-100px">PRODUCT</th>
                                            <th class="text-center min-w-200px">Order Code</th>
                                            <th class="text-center min-w-70px">QTY</th>
                                            <th class="text-center min-w-100px">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($order as $o )
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Thumbnail-->
                                                    <a href="#" class="symbol symbol-50px">
                                                        <span class="symbol-label rounded" style="background-image:url({{$o->image}});"></span>
                                                    </a>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <span>{{$o->orderCode}}</span>
                                                </div>
                                            </td>

                                            <td class="text-center pe-0" data-order="Inactive">
                                                <!--begin::Badges-->
                                                <div class="badge badge-light-success">{{$o->quantity}}</div>
                                                <!--end::Badges-->
                                            </td>
                                            <td class="text-center pe-0" data-order="34">
                                                <span class="fw-bold ms-3 total_price">{{$o->total_price * $o->quantity}}Kyats</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right ">Subtotal:</td>
                                            <td class="sub_total"></td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="text-right ">Shipping Rate:</td>
                                            <td>3000Kyats</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right "><strong>Grand Total:</strong></td>
                                            <td class="total"><strong></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
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
    $(function(){
            $rows=$('table tbody tr')
            let total = 0;
            $rows.each(function(){
                total += parseInt($(this).find('.total_price').html());
            })
            $('.sub_total').html(total+'Kyats');
            $('.total').html(total + 3000 +'Kyats')

        })
</script>
@endsection