<!-- resources/views/components/input.blade.php -->

@props(['name', 'type' => 'text', 'label' => '', 'placeholder' => '', 'value' => '', 'old', 'category','isProduct','product'])

<div class="rounded border d-flex flex-column p-5 mb-5">
    @if ($type == 'edit')
        @if ($label)
            <label class="form-label">{{ $label }}</label>
        @endif
        <input type="text" name="{{ $name }}" value="{{ old($name, $old) }}" class="form-control"
            placeholder="{{ $placeholder }}" {{ $attributes }} />

        @error($name)
            <div class="text-danger">{{ $message }}</div>
        @enderror
    @elseif($type == 'text')
        @if ($label)
            <label class="form-label">{{ $label }}</label>
        @endif
        <input type="text" name="{{ $name }}" value="{{ old($name, $value) }}" class="form-control"
            placeholder="{{ $placeholder }}" {{ $attributes }} />

        @error($name)
            <div class="text-danger">{{ $message }}</div>
        @enderror
    @endif

    @if ($type == 'productCreate')
        @if ($label)
            <label class="form-label">Name</label>
        @endif
        <input type="text" name="name" class="form-control" placeholder="{{ $placeholder }}"
            {{ $attributes }} />
    @elseif ($type == 'productEdit')
        @if ($label)
            <label class="form-label">Name</label>
        @endif
        <input type="text" name="name" class="form-control" placeholder="{{ $placeholder }}" value="{{$product->name}}"
            {{ $attributes }} />
    @endif


</div>
@if ($type == 'productCreate')
    <div class=" d-flex flex-column p-5 ">
        <label class="form-label">Gender</label>
        <select class="form-select" name="gender">
            <option value="men" >Men</option>
            <option value="women">Women</option>
        </select>
    </div>

    <div class=" d-flex flex-column p-5 ">
        <label class="form-label">Categories</label>
        <select class="form-select" name="category">
            <option value="">Choose Category</option>
            @foreach ($category as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="d-flex flex-column p-5">
        <label class="form-label" id="">Type</label>
        <input class="form-control form-control " name="type" placeholder="Enter Type" value=""
            id="kt_tagify_3" />
    </div>

    <div class="d-flex flex-column p-5">
        <label class="form-label">Choose Colors</label>
        <input class="form-control d-flex align-items-center color" name="colors[]" value=""
            id="kt_tagify_colors" />
    </div>
    <div class="d-flex flex-column p-5">
        <label class="form-label">Choose Sizes</label>
        <input class="form-control d-flex align-items-center" name="sizes[]" value="" id="kt_tagify_sizes" />
    </div>
    <div class=" d-flex flex-column p-5">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description" placeholder="description" data-kt-autosize="true"></textarea>
    </div>
    <div class=" d-flex flex-column p-5 mb-5">
        <label class="form-label" id="">Stock</label>
        <input type="number" name="stock" class="form-control" placeholder="Stock" />
    </div>
    <div class=" d-flex flex-column p-5 mb-5">
        <label class="form-label" id="">Price</label>
        <input type="number" name="price" class="form-control" placeholder="Price" />
    </div>
    <div class="card-header ">
        <h1 class="align-self-center">Pricing</h1>
    </div>

    <div class="card-body">
        <div class="row mw-500px mb-5" data-kt-buttons="true"
            data-kt-buttons-target=".form-check-image, .form-check-input">
            <div class="col-4">
                <div class="form-group">
                    <label class="form-check border p-10 shadow-sm">
                        <h3>Discount</h3>
                        <div class="form-check form-check-custom form-check-solid me-10">
                            <input class=" form-control form-check-input" type="checkbox" name="options" id="option1"
                                value="show">
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
            <div class="col-12 form-group mt-3" id="inputRangeContainer" style="display: none;">
                <input type="range" name="percentage" class="form-control" min="0" max="100"
                    id="inputRange" value="0" />
                <span id='rangeValue' class="h2"></span>
                <div class="rounded border d-flex flex-column p-10">
                    <label for="" class="form-label">Text</label>
                    <textarea class="form-control" name="text" placeholder="description" data-kt-autosize="true"></textarea>
                </div>
            </div>
        </div>
    </div>
@elseif ($type == 'productEdit')
    <input type="hidden" name="productId" value="{{$product->id}}">
    <div class=" d-flex flex-column p-5 ">
        <label class="form-label">Gender</label>
        <select class="form-select" name="gender">
            <option value="men" @if($product->gender == "men") selected @endif>Men</option>
            <option value="women" @if($product->gender == "women") selected @endif>Women</option>
        </select>
    </div>

    <div class=" d-flex flex-column p-5 ">
        <label class="form-label">Categories</label>
        <select class="form-select" name="category">
            <option value="">Choose Category</option>
            @foreach ($category as $c)
                <option value="{{ $c->id }}" @if($product->category_id == $c->id) selected @endif>{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="d-flex flex-column p-5">
        <label class="form-label" id="">Type</label>
        <input class="form-control form-control " name="type" placeholder="Enter Type" value="{{$product->type}}"
            id="kt_tagify_3" />
    </div>

    <div class="d-flex flex-column p-5">
        <label class="form-label">Choose Colors</label>
        {{ implode(', ', $product->colors->pluck('color')->unique()->toArray()) }}
        <input class="form-control d-flex align-items-center color" name="colors[]" value="{{{ implode(', ', $product->colors->pluck('color')->unique()->toArray()) }}}"
            id="kt_tagify_colors" />
    </div>
    <div class="d-flex flex-column p-5">
        <label class="form-label">Choose Sizes</label>
        {{ implode(', ', $product->sizes->pluck('size')->unique()->toArray()) }}
        <input class="form-control d-flex align-items-center" name="sizes[]" value="{{ implode(', ', $product->sizes->pluck('size')->unique()->toArray()) }}" id="kt_tagify_sizes" />
    </div>
    <div class=" d-flex flex-column p-5">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description" placeholder="description" data-kt-autosize="true">{{$product->description}}</textarea>
    </div>
    <div class=" d-flex flex-column p-5 mb-5">
        <label class="form-label" id="">Stock</label>
        <input type="number" name="stock" class="form-control" placeholder="Stock" value="{{$product->stock}}" />
    </div>
    <div class=" d-flex flex-column p-5 mb-5">
        <label class="form-label" id="">Price</label>
        <input type="number" name="price" class="form-control" placeholder="Price" value="{{$product->price}}" />
    </div>
    <div class=" d-flex flex-column p-5 ">
        <label class="form-label">Status</label>
        <select class="form-select" name="status">
            <option value="0" @if($product->status == 0) selected @endif>enable</option>
            <option value="1" @if($product->status == 1) selected @endif>disable</option>
        </select>
    </div>
    <div class="card-header ">
        <h1 class="align-self-center">Pricing</h1>
    </div>

    <div class="card-body">
        <div class="row mw-500px mb-5" data-kt-buttons="true"
            data-kt-buttons-target=".form-check-image, .form-check-input">
            <div class="col-4">
                <div class="form-group">
                    <label class="form-check border p-10 shadow-sm">
                        <h3>Discount</h3>
                        <div class="form-check form-check-custom form-check-solid me-10">
                            <input class=" form-control form-check-input" type="checkbox" name="options"  id="option1"
                                value="show">
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
            <div class="col-12 form-group mt-3" id="inputRangeContainer" style="display: none;">
                @foreach ($product->discounts as $discount)
                <input type="range" name="percentage" class="form-control" min="0" max="100"
                    id="inputRange" value="{{$discount->percentage}}" />
                <span id='rangeValue' class="h2">{{$discount->percentage}}</span>
                <div class="rounded border d-flex flex-column p-10">
                    <label for="" class="form-label">Text</label>
                    <textarea class="form-control" name="text" placeholder="description" data-kt-autosize="true">{{$discount->text}}</textarea>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
