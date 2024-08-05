@extends('layout.master')

@section('content')
<!--begin::Main-->
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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Dashboards</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700">Default</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Dashboard</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create Project</a>
                    <!--end::Actions-->
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
                <!--begin::Row-->
                <div class="row gx-5 gx-xl-10">
                    <!--begin::Col-->
                    <div class="col-xxl-6 mb-5 mb-xl-10">
                        <!--begin::Chart widget 8-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Performance Overview</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <ul class="nav" id="kt_chart_widget_8_tabs">
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle" href="#kt_chart_widget_8_week_tab">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#kt_chart_widget_8_month_tab">Week</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6">
                                <!--begin::Tab content-->
                                <div class="tab-content">
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_chart_widget_8_week_tab" role="tabpanel">
                                        <!--begin::Statistics-->
                                        <div class="mb-5">
                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="fs-1 fw-semibold text-gray-400 me-1 mt-n1">$</span>
                                                <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">18,89</span>
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>4,8%</span>
                                            </div>
                                            <!--end::Statistics-->
                                            <!--begin::Description-->
                                            <span class="fs-6 fw-semibold text-gray-400">Avarage cost per interaction</span>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Statistics-->
                                        <!--begin::Chart-->
                                        <div id="kt_chart_widget_8_week_chart" class="ms-n5 min-h-auto" style="height: 275px"></div>
                                        <!--end::Chart-->
                                        <!--begin::Items-->
                                        <div class="d-flex flex-wrap pt-5">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-primary me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Social Campaigns</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-danger me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-&lt;gray-600 fs-6">Google Ads</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Email Newsletter</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-warning me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Courses</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-column pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-info me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">TV Campaign</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Radio</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->
                                        </div>
                                        <!--ed::Items-->
                                    </div>
                                    <!--end::Tab pane-->
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade active show" id="kt_chart_widget_8_month_tab" role="tabpanel">
                                        <!--begin::Statistics-->
                                        <div class="mb-5">
                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="fs-1 fw-semibold text-gray-400 me-1 mt-n1">$</span>
                                                <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">8,55</span>
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>2.2%</span>
                                            </div>
                                            <!--end::Statistics-->
                                            <!--begin::Description-->
                                            <span class="fs-6 fw-semibold text-gray-400">Avarage cost per interaction</span>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Statistics-->
                                        <!--begin::Chart-->
                                        <div id="kt_chart_widget_8_month_chart" class="ms-n5 min-h-auto" style="height: 275px"></div>
                                        <!--end::Chart-->
                                        <!--begin::Items-->
                                        <div class="d-flex flex-wrap pt-5">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-primary me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Social Campaigns</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-danger me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Google Ads</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Email Newsletter</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-warning me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Courses</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-column pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-info me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">TV Campaign</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Radio</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->
                                        </div>
                                        <!--ed::Items-->
                                    </div>
                                    <!--end::Tab pane-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Chart widget 8-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 4-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Currency-->
                                        <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                        <!--end::Currency-->
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">69,700</span>
                                        <!--end::Amount-->
                                        <!--begin::Badge-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2%</span>
                                        <!--end::Badge-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Expected Earnings</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                <!--begin::Chart-->
                                <div class="d-flex flex-center me-5 pt-2">
                                    <div id="kt_card_widget_4_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11"></div>
                                </div>
                                <!--end::Chart-->
                                <!--begin::Labels-->
                                <div class="d-flex flex-column content-justify-center w-100">
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-semibold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 flex-grow-1 me-4">Shoes</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-700 text-xxl-end">$7,660</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 flex-grow-1 me-4">Gaming</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-700 text-xxl-end">$2,820</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-semibold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #E4E6EF"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 flex-grow-1 me-4">Others</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-700 text-xxl-end">$45,257</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Labels-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 4-->
                        <!--begin::Card widget 5-->
                        <div class="card card-flush h-md-50 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">1,836</span>
                                        <!--end::Amount-->
                                        <!--begin::Badge-->
                                        <span class="badge badge-light-danger fs-base">
                                            <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2%</span>
                                        <!--end::Badge-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Orders This Month</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-bolder fs-6 text-dark">1,048 to Goal</span>
                                        <span class="fw-bold fs-6 text-gray-400">62%</span>
                                    </div>
                                    <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                        <div class="bg-success rounded h-8px" role="progressbar" style="width: 62%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 5-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 6-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Currency-->
                                        <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                        <!--end::Currency-->
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2,420</span>
                                        <!--end::Amount-->
                                        <!--begin::Badge-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.6%</span>
                                        <!--end::Badge-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Average Daily Sales</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end px-0 pb-0">
                                <!--begin::Chart-->
                                <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 6-->
                        <!--begin::Card widget 7-->
                        <div class="card card-flush h-md-50 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">6.3k</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">New Customers This Month</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-column justify-content-end pe-0">
                                <!--begin::Title-->
                                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s Heroes</span>
                                <!--end::Title-->
                                <!--begin::Users group-->
                                <div class="symbol-group symbol-hover flex-nowrap">
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                                        <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                                        <img alt="Pic" src="assets/media/avatars/300-11.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                        <img alt="Pic" src="assets/media/avatars/300-2.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Perry Matthew">
                                        <span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
                                        <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                    </div>
                                    <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                        <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                                    </a>
                                </div>
                                <!--end::Users group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 7-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                        <!--begin::Chart widget 3-->
                        <div class="card card-flush overflow-hidden h-md-100">
                            <!--begin::Header-->
                            <div class="card-header py-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Sales This Months</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                        <i class="ki-duotone ki-dots-square fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </button>
                                    <!--begin::Menu 2-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">New Ticket</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">New Customer</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                            <!--begin::Menu item-->
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">New Group</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <!--end::Menu item-->
                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Admin Group</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Staff Group</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Member Group</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">New Contact</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mt-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 2-->
                                    <!--end::Menu-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                <!--begin::Statistics-->
                                <div class="px-9 mb-5">
                                    <!--begin::Statistics-->
                                    <div class="d-flex mb-2">
                                        <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">14,094</span>
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Another $48,346 to Goal</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Chart-->
                                <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Chart widget 3-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <!--begin::List widget 6-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Top Selling Products</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">8k social visitors</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">View All</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                <th class="p-0 w-50px pb-1">ITEM</th>
                                                <th class="ps-0 min-w-140px"></th>
                                                <th class="text-end min-w-140px p-0 pb-1">TOTAL PRICE</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="assets/media/stock/ecommerce/210.gif" class="w-50px" alt="" />
                                                </td>
                                                <td class="ps-0">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1802</a>
                                                    <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2347</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">$72.00</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="assets/media/stock/ecommerce/215.gif" class="w-50px" alt="" />
                                                </td>
                                                <td class="ps-0">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                                    <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2347</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">$45.00</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="assets/media/stock/ecommerce/209.gif" class="w-50px" alt="" />
                                                </td>
                                                <td class="ps-0">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                    <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2347</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">$168.00</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="assets/media/stock/ecommerce/214.gif" class="w-50px" alt="" />
                                                </td>
                                                <td class="ps-0">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Yellow Stone</a>
                                                    <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2347</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">$72.00</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List widget 6-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">2023&copy;</span>
            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
                <a href="https://keenthemes.com/products/saul-html-pro" target="_blank" class="menu-link px-2">Purchase</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>
<!--end:::Main-->
@endsection