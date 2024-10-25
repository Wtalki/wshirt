@props(['data', 'productData', 'type'])
@if ($type == 'categoryList')
<tr>
    <td>
        <div class="d-flex align-items-center">
            <a href="#" class="symbol symbol-50px">
                <span class="symbol-label"
                    style="
                        background-image: url({{ asset('storage/images/' . $data->image) }});
                      "></span>
            </a>
            <div class="ms-5">
                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold"
                    data-kt-ecommerce-product-filter="product_name">{{ $data->name }}</a>
                <br />
                <span>{{ $data->description }}</span>
            </div>
        </div>
    </td>

    <td class="text-center">
        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
            data-kt-menu="true">
            <div class="menu-item px-3">
                <a href="{{ route('edit#category', $data->id) }}" class="menu-link px-3">Edit</a>
            </div>
            <div class="menu-item px-3">
                <a href="{{ route('category#delete', $data->id) }}" class="menu-link px-3"
                    data-kt-ecommerce-product-filter="delete_row">Delete</a>
            </div>
        </div>
    </td>
</tr>
@endif

@if ($type == 'productList')
    <tr>
        <td>
            <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input multipleDelete" type="checkbox" value="{{ $productData->id }}" />
            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="#" class="symbol symbol-50px">
                    <span class="symbol-label"
                        style="background-image:url({{ asset('storage/' . $productData->images[0]->path) }});"></span>
                </a>
                <div class="ms-5">
                    <a href="#"
                        class="text-gray-800 text-hover-primary fs-5 fw-bold productName">{{ $productData->name }}</a>
                </div>
            </div>
        </td>
        <td class="text-center pe-0">
            <span class="fw-bold">{{ $productData->price }}Kyats</span>
        </td>
        <td class="text-center pe-0">
            <span class="fw-bold">{{ $productData->sku_number }}</span>
        </td>
        <td class="text-center pe-0" data-order="Inactive">
            <div class="badge badge-light-success categoryName">{{ $productData->category->name }}</div>
        </td>
        <td class="text-center pe-0" data-order="Inactive">
            <div class="badge badge-light-success categoryName">{{ $productData->created_at->format('m/d/Y') }}</div>
        </td>
        <td class="text-end">
            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                data-kt-menu="true">
                <div class="menu-item px-3">
                    <a href="{{ route('edit#product', $productData->id) }}" class="menu-link px-3">Edit</a>
                </div>
                <div class="menu-item px-3">
                    <button class="menu-link btn px-3 singleDelete" id="{{ $productData->id }}">Delete</button>
                </div>
            </div>
        </td>
    </tr>
@endif
