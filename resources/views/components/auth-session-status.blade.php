@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'p-4 rounded-lg mb-4 bg-green-50 border border-green-200 text-green-700 text-sm']) }}>
        {{ $status }}
    </div>
@endif