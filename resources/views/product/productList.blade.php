@extends('layout.master')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="../dist/index.html" class="text-gray-500">
                                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Catalog</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">Products</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            Products</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <input type="text" class="form-control form-control-solid w-250px ps-12 searchInput" placeholder="Search Product" />
                            </div>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <div class="w-100 mw-150px">
                                <select class="form-select form-select-solid categoryFilter">
                                    <option value="">All</option>
                                    @foreach ($category as $c )
                                    <option value="{{$c->name}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{ route('create#product') }}" class="btn btn-primary">Add Product</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 data-table" id="data-table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-20px pe-2">
                                        <i class="fa-regular fa-trash-can fs-3 text-danger cursor-pointer deleteButton"></i>
                                    </th>
                                    <th class="min-w-200px">Product</th>
                                    <th class="text-center min-w-100px">Price</th>
                                    <th class="text-center min-w-100px">SKU_Number</th>
                                    <th class="text-center min-w-70px">Category</th>
                                    <th class="text-center min-w-70px">status</th>
                                    <th class="text-center min-w-70px">Date</th>
                                    <th class="text-center min-w-70px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($data as $d)
                                <x-data :productData="$d" type="productList" />
                                {{-- <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input multipleDelete" type="checkbox" value="{{$d->id}}" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url({{asset('storage/'.$d->images[0]->path)}});"></span>
                                            </a>
                                            <div class="ms-5">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold productName">{{ $d->name }}</a>
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
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('edit#product',$d->id) }}" class="menu-link px-3">Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <button class="menu-link btn px-3 singleDelete" id="{{$d->id}}">Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr> --}}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
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
