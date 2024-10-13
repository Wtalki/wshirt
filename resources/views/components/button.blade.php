@props(['type','text' => 'Save'])

@if($type == 'create')
    <button type="submit" {{ $attributes->merge(['class' => 'btn']) }}>
        {{ $text }}
    </button>
@elseif($type == 'update')

<button type="submit" {{ $attributes->merge(['class' => 'btn']) }}>
    {{ $text }}
</button>
@endif
