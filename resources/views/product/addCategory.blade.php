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
                                <a href="{{ route('category#list') }}" class="text-gray-500">
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
                            <li class="breadcrumb-item text-gray-700">Add Category</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Category</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <form action="{{ route('category#create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header ">
                                    <h1 class="align-self-center">Image</h1>
                                </div>
                                <div class="card-body">
                                    <x-image placeholder="/default/default.png" :isMultiple='false' name='image' type="createImage" />
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h1 class="align-self-center">Category create</h1>

                                    @if(session('success'))
                                        <x-alert type='success'/>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <x-input name="name" type="text" label="Name" placeholder="Category Name.." />
                                    <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Description"></textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message}}</div>
                                    @enderror
                                </div>

                                <div class="text-end mb-2">
                                    <x-button class="p-5 btn-primary w-25" text="Create" type='create' />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


