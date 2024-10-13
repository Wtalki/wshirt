<!-- resources/views/components/input.blade.php -->

@props(['name', 'type' => 'text', 'label' => '', 'placeholder' => '', 'value' => '','old'])

<div class="rounded border d-flex flex-column p-10 mb-5">
    @if($type == 'edit')
        @if($label)
        <label class="form-label">{{ $label }}</label>
        @endif
        <input type="text" name="{{ $name }}" value="{{ old($name, $old) }}" class="form-control" placeholder="{{ $placeholder }}" {{ $attributes }} />

        @error($name)
            <div class="text-danger">{{ $message }}</div>
        @enderror
    @elseif($type == 'text')
        @if($label)
        <label class="form-label">{{ $label }}</label>
        @endif
        <input type="text" name="{{ $name }}" value="{{ old($name, $value) }}" class="form-control" placeholder="{{ $placeholder }}" {{ $attributes }} />

        @error($name)
            <div class="text-danger">{{ $message }}</div>
        @enderror
    @endif
</div>
