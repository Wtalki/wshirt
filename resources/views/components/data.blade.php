@props(['data'])
        <tr>
            <td>
                <div class="d-flex align-items-center">
                  <a href="#" class="symbol symbol-50px">
                    <span
                      class="symbol-label"
                      style="
                        background-image: url({{asset('storage/images/'.$data->image)}});
                      "
                    ></span>
                  </a>
                  <div class="ms-5">
                    <a
                      href="#"
                      class="text-gray-800 text-hover-primary fs-5 fw-bold"
                      data-kt-ecommerce-product-filter="product_name"
                      >{{$data->name}}</a
                    >
                    <br />
                    <span
                      >{{$data->description}}</span
                    >
                  </div>
                </div>
              </td>

            <td class="text-center">
                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                    <div class="menu-item px-3">
                        <a href="{{route('edit#category',$data->id)}}" class="menu-link px-3">Edit</a>
                    </div>
                    <div class="menu-item px-3">
                        <a href="{{route('category#delete',$data->id)}}" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                    </div>
                </div>
            </td>
        </tr>
