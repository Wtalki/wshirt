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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Catalog</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700">Products</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            Products</h1>
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
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <input type="text" class="form-control form-control-solid w-250px ps-12 searchInput" placeholder="Search Product" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid categoryFilter">
                                    <option value="">All</option>
                                    @foreach ($category as $c )
                                    <option value="{{$c->name}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--begin::Add product-->
                            <a href="{{ route('create#product') }}" class="btn btn-primary">Add Product</a>
                            <!--end::Add product-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5 data-table" id="data-table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-20px pe-2">
                                        <i class="fa-regular fa-trash-can fs-3 text-danger cursor-pointer deleteButton"></i>
                                    </th>
                                    <th class="min-w-200px">Product</th>
                                    <th class="text-center min-w-100px">Price</th>
                                    <th class="text-center min-w-70px">Category</th>
                                    <th class="text-center min-w-70px">Date</th>
                                    <th class="text-center min-w-70px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($data as $d)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input multipleDelete" type="checkbox" value="{{$d->id}}" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="#" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url({{asset('storage/'.$d->images[0]->path)}});"></span>
                                            </a>
                                            <!--end::Thumbnail-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold productName">{{ $d->name }}</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center pe-0">
                                        <span class="fw-bold">{{$d->price}}Kyats</span>
                                    </td>
                                    <td class="text-center pe-0" data-order="Inactive">
                                        <div class="badge badge-light-success categoryName">{{$d->category->name}}</div>
                                    </td>
                                    <td class="text-center pe-0" data-order="Inactive">
                                        <div class="badge badge-light-success categoryName">{{$d->created_at->format('m/d/Y')}}</div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('edit#product',$d->id) }}" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <button class="menu-link btn px-3 singleDelete" id="{{$d->id}}">Delete</button>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination d-flex justify-content-evenly text-black">
                            <button id="prevPage " class="btn btn-primary prevPage">Previous</button>
                            <div class="d-flex justify-content-center align-items-center w-25 bg-dark text-black rounded">
                                <div class=" text-black number"> </div>/
                                <span class="text-black total"></span>
                            </div>
                            <button id="nextPage " class="btn btn-primary nextPage">Next</button>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
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
    $(function() {
            var rowsPerPage = 10;
            var rows = $('#data-table tbody tr');
            var rowsCount = rows.length;
            var pageCount = Math.ceil(rowsCount / rowsPerPage);
            var currentPage = 1;
            $('.number').html(currentPage);
            $('.total').html(pageCount);

            function displayRows(page) {
                var start = (page - 1) * rowsPerPage;
                var end = start + rowsPerPage;
                rows.hide();
                rows.slice(start, end).show();
            }

            function updatePaginationButtons() {
                $('.prevPage').prop('disabled', currentPage === 1);
                $('.nextPage').prop('disabled', currentPage === pageCount);
            }

            $('.prevPage').click(function() {

                if (currentPage > 1) {
                    currentPage--;
                    displayRows(currentPage);
                    updatePaginationButtons();
                }
            $('.number').html(currentPage);
            });

            $('.nextPage').click(function() {
                if (currentPage < pageCount) {
                    currentPage++;
                    displayRows(currentPage);
                    updatePaginationButtons();
                }
            $('.number').html(currentPage);
            });
            $('.searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();

                rows.filter(function(row) {
                    $(this).toggle($(this).find('.productName').text().toLowerCase().indexOf(value) > -1);
                });
                rowsCount = $('.data-table tbody tr').length;
                pageCount = Math.ceil(rowsCount / rowsPerPage);
                currentPage = 1;
                // displayRows(currentPage);
                updatePaginationButtons();
            });
            function filterTable(){
                var categoryValue = $('.categoryFilter').val().toLowerCase();

                rows.each(function(){
                    $(this).toggle($(this).find('.categoryName').text().toLowerCase().indexOf(categoryValue) > -1);
                })
                rowsCount = $('.data-table tbody tr').length;
                pageCount = Math.ceil(rowsCount / rowsPerPage);
                currentPage = 1;
                // displayRows(currentPage);
                updatePaginationButtons();
            }
            $('.categoryFilter').on('change',function(){
                filterTable();
            })

            //multiple delete
            $('.deleteButton').click(function(){
                let id = [];
                if(confirm('Are you sure you want to delete this')){
                    $('.multipleDelete:checked').each(function(){
                        id.push($(this).val());
                        $(this).parent().parent().parent().remove();
                    })
                    if (id.length > 0) {
                        $.ajax({
                            url: '/delete/multiple/product',
                            method: 'get',
                            data: {
                                id: id
                            },
                        })
                    }

                }
            })
            //single dlete
            $('.singleDelete').click(function(){
                $id = $(this).attr('id');
                $.ajax({
                url: "/single/delete/" + $id,
                })
                $(this).parent().parent().parent().parent().remove();

            })
            displayRows(currentPage);
            updatePaginationButtons();
        })
</script>
@endsection