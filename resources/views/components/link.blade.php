@php
    $classes = "underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
@endphp
<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <a {{ $attributes->merge(['class' => $classes]) }} >
        {{ $slot }}
    </a>
</div>