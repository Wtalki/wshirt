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
                <form action="{{ route('product#create') }}" id="myForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header ">
                                    <h1 class="align-self-center">Image</h1>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mt-5 border p-6 text-center">
                                        <label for="imageUpload" class="btn btn-primary">Upload Images</label>
                                        <input type="file" name="images[]" class="form-control" id="imageUpload" multiple required>
                                    </div>
                                    <div class="row" id="imagePreviewContainer"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header ">
                                    <h1 class="align-self-center">General</h1>
                                </div>
                                <div class="card-body">
                                    <!--begin::Input group-->
                                    <div class=" d-flex flex-column p-5 ">
                                        <label class="form-label" id="">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" />
                                    </div>
                                    <div class=" d-flex flex-column p-5 ">
                                        <h3>Gender</h3>
                                        <select class="form-select" name="gender">
                                            <option value="men">Men</option>
                                            <option value="women">Women</option>
                                        </select>
                                    </div>
                                    <div class=" d-flex flex-column p-5 ">
                                        <h3>Categories</h3>
                                        <select class="form-select" name="category">
                                            <option value="">Choose Category</option>
                                            @foreach ($category as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class=" d-flex flex-column p-5 ">
                                        <label class="form-label" id="">Type</label>
                                        <input type="text" name="type" class="form-control" placeholder="Type" />
                                    </div>
                                    <div class=" d-flex flex-column p-5 ">
                                        <div class="mt-3">
                                            <h4>Selected Colors:</h4>
                                            <ul id="selectedColors"></ul>
                                        </div>
                                        <h3>Color</h3>
                                        <select class="form-select" name="colors[]" id="multiSelectColor" multiple>
                                            <option value="">Choose colors</option>
                                            <option value="red">red</option>
                                            <option value="blue">blue</option>
                                            <option value="green">green</option>
                                            <option value="black">black</option>
                                            <option value="white">white</option>
                                            <option value="pink">pink</option>
                                            <option value="yellow">yellow</option>
                                            <option value="purple">purple</option>
                                            <option value="orange">orange</option>
                                            <option value="brown">brown</option>
                                            <option value="grey">grey</option>

                                        </select>
                                    </div>
                                    <div class=" d-flex flex-column p-5 ">
                                        <div class="mt-3">
                                            <h4>Selected Sizes:</h4>
                                            <ul id="selectedSizes"></ul>
                                        </div>
                                        <h3>Size</h3>
                                        <select class="form-select multiSelectSize" id="multiSelectSize" name="sizes[]" multiple>
                                            <option value="">Choose size</option>
                                            <option value="xs">XS</option>
                                            <option value="s">S</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                            <option value="xxl">XXL</option>
                                        </select>
                                    </div>
                                    <!--begin::basic autosize textarea-->
                                    <div class="rounded border d-flex flex-column p-5">
                                        <label for="" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" data-kt-autosize="true"></textarea>
                                    </div>
                                    <!--end::basic autosize textarea-->
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header ">
                                <h1 class="align-self-center">Pricing</h1>
                            </div>
                            <div class="card-body">
                                <!--begin::Input group-->
                                <div class="rounded border d-flex flex-column p-10 mb-5">
                                    <label class="form-label" id="">Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="Price" />
                                </div>
                                <!--end::Input group-->
                                <!--begin::Row-->
                                <div class="row mw-500px mb-5" data-kt-buttons="true" data-kt-buttons-target=".form-check-image, .form-check-input">
                                    <!--bepgin::Col-->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-check border p-10 shadow-sm">
                                                <h3>Discount</h3>
                                                <div class="form-check form-check-custom form-check-solid me-10">
                                                    <input class=" form-control form-check-input" type="checkbox" name="options" id="option1" value="show">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                     <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-check border p-10 shadow-sm">
                                                <h3>Cover</h3>
                                                <div class="form-check form-check-custom form-check-solid me-10">
                                                    <input class=" form-control form-check-input" type="checkbox" name="cover" value="cover">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-12 form-group mt-3" id="inputRangeContainer" style="display: none;">
                                        <input type="range" name="percentage" class="form-control" min="0" max="100" id="inputRange" value="0" />
                                        <span id='rangeValue' class="h2"></span>
                                        <div class="rounded border d-flex flex-column p-10">
                                            <label for="" class="form-label">Text</label>
                                            <textarea class="form-control" name="text" data-kt-autosize="true"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <div class="text-end">
                                <button class="btn btn-primary w-25">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end::Products-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
@endsection

@section('scriptSource')
<script>
    $(document).ready(function() {
            $('#imageUpload').on('change', function() {
                const files = this.files;
                const previewContainer = $('#imagePreviewContainer');
                previewContainer.empty();

                if (files) {
                    Array.from(files).forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = $('<img>').attr('src', e.target.result).addClass(
                                'image-preview img-thumbnail');
                            previewContainer.append(img);
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });

            $('#option1').on('click', function() {
                if ($(this).is(':checked')) {
                    $('#inputRangeContainer').show();
                } else {
                    $('#inputRangeContainer').hide();
                }

            });
            $('#inputRange').on('input', function() {
                $('#rangeValue').text($(this).val() + '%');
            });

            //validation
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    category: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
                    color: {
                        required: true,
                    },
                    size: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    text: {
                        required: true,
                    },
                    'images[]': {
                        required: true,
                        accept: 'image/jpg,image/jpeg,image/png,'
                    }
                },
                messages: {
                    name: {
                        required: 'please enter your name',
                    },
                    category: {
                        required: ' choose your category',
                    },
                    type: {
                        required: 'please enter your type',
                    },
                    size: {
                        required: 'please enter your size'
                    },
                    color: {
                        required: 'please enter your color'
                    },
                    description: {
                        required: 'please enter your description'
                    },
                    price: {
                        required: 'please enter your price'
                    },
                    text: {
                        required: 'please enter your text'
                    },
                    'images[]': {
                        required: "Please select at least one image",
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

            $('.multiSelectSize').change(function() {
                // Clear the list
                $('#selectedSizes').empty();

                // Get selected options
                var selectedOptions = $(this).find('option:selected');

                // Add selected options to the list
                selectedOptions.each(function() {
                    $('#selectedSizes').append('<li>' + $(this).text() + '</li>');
                });
            });
            $('#multiSelectColor').change(function() {
            // Clear the list
            $('#selectedColors').empty();

            // Get selected options
            var selectedOptions = $(this).find('option:selected');

            // Add selected options to the list
            selectedOptions.each(function() {
            $('#selectedColors').append('<li>' + $(this).text() + '</li>');
            });
            });
        });
</script>
@endsection
