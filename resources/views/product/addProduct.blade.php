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
                                        <label for="imageUpload" class="btn btn-primary">Upload Image</label>
                                        <input type="file" name="images[]" class="form-control" style="display: none;" id="imageUpload" multiple   accept="image/*">

                                        <div class="row mt-3" id="imagePreviewContainer">
                                            <img src="{{asset('default/default.png')}}" class="showImg img-thumbnail" alt="Default Image" id="imagePreview" width="150" height="150">
                                        </div>
                                    </div>
                                    <div class="form-group mt-5 p-6">
                                        <label class="form-label">Tags</label>
                                        <input class="form-control form-control-solid" name="tags[]" value="" id="kt_tagify_tags"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header ">
                                    <h1 class="align-self-center">General</h1>
                                </div>
                                <div class="card-body">
                                    {{-- form  --}}
                                    <x-input  type="product" label="Name" placeholder="Name" :category="$category" />
                                    <x-button class="btn-primary mx-auto w-50" type="create" />
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

@section('scriptSource')
<script>
    $(document).ready(function() {

            $('#imageUpload').on('change', function(event) {
                $('#imagePreviewContainer').empty();
                const files = event.target.files;
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    if (file.type.startsWith('image/')) {
                        let reader = new FileReader();

                        reader.onload = function(e) {
                            let img = $('<img/>', {
                                src: e.target.result,
                                alt: 'Preview Image ' + (i + 1),
                            });
                            $('#imagePreviewContainer').append(img);
                        };

                        reader.readAsDataURL(file);
                    }
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
                    'colors[]': {
                        required: true,
                    },
                    'sizes[]': {
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
                    'sizes[]': {
                        required: 'please enter your size'
                    },
                    'colors[]': {
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
                            '.mb-3'));
                    } else {
                        error.addClass('invalid-feedback');
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                }
            })
    });

    //type
    var input1 = document.querySelector("#kt_tagify_3");
    new Tagify(input1);

        // color
        var tagify = new Tagify(document.querySelector('#kt_tagify_colors'), {
    delimiters: null,
    templates: {
        tag: function (tagData) {
            try {
                // _ESCAPE_START_
                return `<tag title='${tagData.value}' contenteditable='false' spellcheck="false"
                    class='tagify__tag  ' ${this.getAttributes(tagData)}>
                    <span class="rounded-circle"  style="background:${tagData.code};width:20px;height:20px;"></span>
                        <x title='remove tag' class='tagify__tag__removeBtn'></x>
                        <div class="d-flex align-items-center ">
                            <span class='tagify__tag-text ' >${tagData.value}</span>
                        </div>
                    </tag>`
                // _ESCAPE_END_
            }
            catch (err) { }
        },

        dropdownItem: function (tagData) {
            try {
                return `<div ${this.getAttributes(tagData)} class='tagify__dropdown__item  '>
                            <span >${tagData.value}</span>
                            <span  style="background:${tagData.code};width:40px;height:40px;">####</span>
                        </div>`
            }
            catch (err) { }
        }
    },
    enforceWhitelist: true,
    whitelist: [
        { value: 'Black', code: '#000000' },
        { value: 'White', code: '#FFFFFF', searchBy: 'beach, sub-tropical' },
        { value: 'Red', code: '#FF0000' },
        { value: 'Green', code: '#008000' },
        { value: 'Blue', code: '#0000FF' },
        { value: 'Yellow', code: '#FFFF00' },
        { value: 'Cyan', code: '#00FFFF' },
        { value: 'Magenta', code: '#FF00FF' },
        { value: 'Gray', code: '#808080' },
        { value: 'Silver', code: '#C0C0C0' },
        { value: 'Maroon', code: '#800000' },
        { value: 'Olive', code: '#808000' },
        { value: 'Navy', code: '#000080' },
        { value: 'Purple', code: '#800080' },
        { value: 'Teal', code: '#008080' },
        { value: 'Orange', code: '#FFA500' },
        { value: 'Pink', code: '#FFC0CB' },
        { value: 'Brown', code: '#A52A2A' },
        { value: 'Gold', code: '#FFD700' },
        { value: 'Coral	', code: '#FF7F50' },
        { value: 'Light Gray', code: '#D3D3D3' },
        { value: 'Dark Gray', code: '#A9A9A9' },
        { value: 'Light Blue', code: '#ADD8E6' },
        { value: 'Dark Blue', code: '#00008B' },
        { value: 'Light Green', code: '#90EE90' },
        { value: 'Dark Green', code: '#006400' },
        { value: 'Light Cyan', code: '#E0FFFF' },
        { value: 'Dark Cyan', code: '#008B8B' },
        { value: 'Light Yellow', code: '#FFFFE0' },
        { value: 'Dark Red', code: '#8B0000' },
        { value: 'Light Coral', code: '#F08080' },
        { value: 'Dark Magenta', code: '#8B008B' },
        { value: 'Light Pink', code: '#FFB6C1' },
        { value: 'Dark Orange', code: '#FF8C00' },
        { value: 'Light Salmon	', code: '#FFA07A' },
        { value: 'Dark Salmon', code: '#E9967A' },
        { value: 'Light Sea Green', code: '##20B2AA' },
        { value: 'Dark Turquoise', code: '#00CED1' },
        { value: 'Light Goldenrod', code: '#FAFAD2' },
        { value: 'Indigo', code: '#4B0082' },
        { value: 'Light Sky Blue', code: '#87CEFA' },
        { value: 'Dark Violet', code: '#9400D3' },
        { value: 'Light Slate Gray', code: '#778899' },
        { value: 'Dark Slate Gray', code: '#2F4F4F' },
        { value: 'Light Steel Blue', code: '#B0C4DE' },
        { value: 'Dark Khaki', code: '#BDB76B' },
        { value: 'Light Coral', code: '#F08080' },
        { value: 'Dark Goldenrod', code: '#B8860B' },
        { value: 'Light Yellow', code: '#FFFFE0' },
        { value: 'Dark Olive Green', code: '#556B2F' },
        { value: 'Light Salmon', code: '#FFA07A' },
        { value: 'Dark Sea Green', code: '#8FBC8F' },
        { value: 'Light Green', code: '#90EE90' },
        { value: 'Light Pink', code: '#FFB6C1' },
        { value: 'Dark Red', code: '#8B0000' },
    ],
    dropdown: {
        enabled: 1,
        classname: 'extra-properties'
    }
})

var tagsToAdd = tagify.settings.whitelist.slice(0, 1);
tagify.addTags(tagsToAdd);

        // color
        var tagify = new Tagify(document.querySelector('#kt_tagify_sizes'), {
    delimiters: null,
    templates: {
        tag: function (tagData) {
            try {
                // _ESCAPE_START_
                return `<tag title='${tagData.value}' contenteditable='false' spellcheck="false"
                    class='tagify__tag  ' ${this.getAttributes(tagData)}>
                        <x title='remove tag' class='tagify__tag__removeBtn'></x>
                        <div class="d-flex align-items-center ">
                            <span class='tagify__tag-text ' >${tagData.value}</span>
                        </div>
                    </tag>`
                // _ESCAPE_END_
            }
            catch (err) { }
        },

        dropdownItem: function (tagData) {
            try {
                return `<div ${this.getAttributes(tagData)} class='tagify__dropdown__item  '>
                            <span >${tagData.value}</span>
                        </div>`
            }
            catch (err) { }
        }
    },
    enforceWhitelist: true,
    whitelist: [
        { value: 'XS', code: 'XS' },
        { value: 'S', code: 'S', searchBy: 'beach, sub-tropical' },
        { value: 'M	', code: 'M	' },
        { value: 'L', code: 'L' },
        { value: 'XL', code: 'XL' },
        { value: 'XXL', code: 'XXL' },
        { value: 'XXXL', code: 'XXXL' },
        { value: '4XL', code: '4XL' },
        { value: '5XL', code: '5XL' },
        { value: '6XL', code: '6XL' },
        { value: '39', code: '39' },
        { value: '40', code: '40' },
        { value: '41', code: '41' },
        { value: '42', code: '42' },
        { value: '43', code: '43' },
        { value: '44', code: '44' },
        { value: '45', code: '45' },
        { value: '46', code: '46' },
        { value: '35', code: '35' },
        { value: '36', code: '36' },
        { value: '37', code: '37' },
        { value: '38', code: '38' },
        { value: '39', code: '39' },
        { value: '40', code: '40' },
        { value: '41', code: '41' },
        { value: '27', code: '27' },
        { value: '28', code: '28' },
        { value: '30', code: '30' },
        { value: '31', code: '31' },
        { value: '32', code: '32' },
        { value: '33', code: '33' },
        { value: '34', code: '34' },
        { value: '10', code: '10' },
        { value: '11', code: '11' },
        { value: '12', code: '12' },
        { value: '13', code: '13' },
        { value: '14', code: '14' },
        { value: '15', code: '15' },
        { value: '16', code: '16' },
        { value: '17', code: '17' },
        { value: '18', code: '18' },
        { value: '19', code: '19' },
        { value: '20', code: '20' },
        { value: '21', code: '21' },
        { value: '22', code: '22' },
        { value: '23', code: '23' },
        { value: '24', code: '24' },
        { value: '25', code: '25' },
        { value: '26', code: '26' },
    ],
    dropdown: {
        enabled: 1,
        classname: 'extra-properties'
    }
})

var tagsToAdd = tagify.settings.whitelist.slice(0, 1);
tagify.addTags(tagsToAdd);



var input = document.querySelector("#kt_tagify_tags");

// Initialize Tagify script on the above inputs
new Tagify(input, {
    whitelist: ["new", "trend", "sale", "discounted","selling fast","last 10"],
    maxTags: 10,
    dropdown: {
        maxItems: 20,           // <- mixumum allowed rendered suggestions
        classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
        enabled: 0,             // <- show suggestions on focus
        closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
    }
});

</script>
@endsection
