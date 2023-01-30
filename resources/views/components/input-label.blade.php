@props(['value', 'required' => 'false'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }} <span class="text-red-600">{{ $required === 'true' ? '*' : ''}}</span>
</label>
